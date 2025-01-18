const video = document.getElementById("video");

// Load face-api.js models
const BASE_URL = "{{ url('') }}"; // Replace dynamically if using Laravel Blade
const MODEL_URL = "storage/models"; // Ensure this path serves your models correctly

Promise.all([
    faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL),
    faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL),
    faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
    faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
])
    .then(startWebcam)
    .catch((error) => {
        console.error("Error loading face-api models:", error);
    });

// Start webcam stream
function startWebcam() {
    navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((stream) => {
            video.srcObject = stream;
        })
        .catch((error) => {
            console.error("Error accessing webcam:", error);
        });
}

// Load labeled face descriptions
async function getLabeledFaceDescriptions() {
    const labels = @json($nipps); // Dapatkan labels yang diteruskan dari Laravel
    return Promise.all(
        labels.map(async (label) => {
            const descriptions = [];
            for (let i = 1; i <= 2; i++) {
                const img = await faceapi.fetchImage(
                    `./storage/labels/${label}/${i}.jpg`
                );
                const detection = await faceapi
                    .detectSingleFace(
                        img,
                        new faceapi.TinyFaceDetectorOptions()
                    )
                    .withFaceLandmarks()
                    .withFaceDescriptor();
                descriptions.push(detection.descriptor);
            }

            return new faceapi.LabeledFaceDescriptors(label, descriptions);
        })
    );
}

// Face detection and recognition
video.addEventListener("play", async () => {
    const labeledFaceDescriptors = await getLabeledFaceDescriptions();
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
        const detections = await faceapi
            .detectAllFaces(video)
            .withFaceLandmarks()
            .withFaceDescriptors();

        const resizedDetections = faceapi.resizeResults(
            detections,
            displaySize
        );

        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

        const results = resizedDetections.map((d) => {
            return faceMatcher.findBestMatch(d.descriptor);
        });
        results.forEach((result, i) => {
            const box = resizedDetections[i].detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {
                label: result,
            });
            drawBox.draw(canvas);
        });
    }, 100);
});
