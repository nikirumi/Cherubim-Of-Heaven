<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .upload-container {
            margin-bottom: 20px;
        }

        #fileUpload {
            display: none;
        }

        .upload-btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload-btn:hover {
            background-color: #0056b3;
        }

        #preview-container {
            margin-top: 20px;
        }

        #preview-container img,
        #preview-container video,
        #preview-container audio {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Upload and Preview Files</h1>
    <div class="upload-container">
        <label for="fileUpload" class="upload-btn">Choose File</label>
        <input 
            type="file" 
            id="fileUpload" 
            accept="audio/*,image/*,video/*"
        >
    </div>

    <div id="preview-container">
        <p id="preview-message">No file selected yet.</p>
    </div>

    <script>
        document.getElementById('fileUpload').addEventListener('change', function () {
            const file = this.files[0];
            const previewContainer = document.getElementById('preview-container');
            const previewMessage = document.getElementById('preview-message');
            
            // Clear previous previews
            previewContainer.innerHTML = "";

            if (file) {
                const fileType = file.type;

                // Check if it's an image
                if (fileType.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = "Image preview";
                    previewContainer.appendChild(img);
                } 
                // Check if it's a video
                else if (fileType.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    video.alt = "Video preview";
                    previewContainer.appendChild(video);
                } 
                // Check if it's an audio file
                else if (fileType.startsWith('audio/')) {
                    const audio = document.createElement('audio');
                    audio.src = URL.createObjectURL(file);
                    audio.controls = true;
                    audio.alt = "Audio preview";
                    previewContainer.appendChild(audio);
                } 
                // Unsupported file type
                else {
                    previewMessage.textContent = "Unsupported file type.";
                    previewContainer.appendChild(previewMessage);
                }
            } else {
                previewMessage.textContent = "No file selected yet.";
                previewContainer.appendChild(previewMessage);
            }
        });
    </script>
</body>
</html>
