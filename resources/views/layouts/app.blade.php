<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <title>@yield('title')</title>

    <style>
        .popup {
            transition: visibility 0s, opacity 0.5s linear;
        }
        .popup.hidden {
            visibility: hidden;
            opacity: 0;
        }
        .popup.visible {
            visibility: visible;
            opacity: 1;
        }
        .index-navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: #333;
            color: white;
        }
        .notice-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            margin: 2rem;
        }
        img {
            object-fit: cover;
            width: 100%;
            height: 300px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav class="index-navbar px-4 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">Notice Board</div>
            <ul class="hidden md:flex space-x-6 text-gray-300">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="{{ route('posts.create') }}">Create</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto py-10">
        @yield('content')
    </main>

    <footer class="bg-[#333] text-white text-center py-4 absolute bottom-0 w-full">
        <p>&copy; 2024 Notice Board. All rights reserved.</p>
    </footer>

    <div id="popup" class="popup hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center">
        <div class="relative max-w-lg w-full bg-white rounded-lg shadow-lg">
            <span id="close-popup" class="absolute top-2 right-2 text-black cursor-pointer text-2xl">&times;</span>
            <div class="p-6">
                <h3 id="popup-title" class="text-2xl font-semibold text-gray-800 mb-4 text-center"></h3>
                <p id="popup-description" class="text-gray-600 mt-2 mb-2 text-justify text-xl"></p>
                <img id="popup-image" src="" alt="" class="w-full rounded-lg object-cover">
                <a id="download-link" href="#" download class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Download</a>
            </div>
        </div>
    </div>

    <script>
        const popup = document.getElementById("popup");
        const popupImage = document.getElementById("popup-image");
        const popupTitle = document.getElementById("popup-title");
        const popupDescription = document.getElementById("popup-description");
        const downloadLink = document.getElementById("download-link");
        const closePopup = document.getElementById("close-popup");

        document.querySelectorAll(".popup-trigger").forEach((img) => {
            img.addEventListener("click", () => {
                const filePath = img.dataset.file;

                popupImage.src = img.src;
                popupTitle.textContent = img.alt;
                popupDescription.textContent = "A detailed view of the notice.";
                downloadLink.href = filePath;

                popup.classList.remove("hidden");
                popup.classList.add("visible");
            });
        });

        closePopup.addEventListener("click", () => {
            popup.classList.remove("visible");
            popup.classList.add("hidden");
        });

        popup.addEventListener("click", (event) => {
            if (event.target === popup) {
                popup.classList.remove("visible");
                popup.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
