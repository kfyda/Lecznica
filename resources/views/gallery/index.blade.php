<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Galeria</h1>

        <section class="flex flex-wrap gap-2 w-full mt-6 p-6 justify-center">
            {{--Zdjęcia--}}
            @foreach($photos as $photo)
                <img class="h-80 cursor-pointer gallery-img" src="{{$photo->getURLImage()}}" alt="" onclick="openModal({{$loop->index}})">
            @endforeach
        </section>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="modal-content" id="modalImage">
            <a class="prev" onclick="changeImage(-1)">&#10094;</a>
            <a class="next" onclick="changeImage(1)">&#10095;</a>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            padding-top: 0;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0,0,0,0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 40px;
            transition: 0.6s ease;
            user-select: none;
        }

        .next {
            right: 0;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
    </style>

    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('.gallery-img');

        function openModal(index) {
            currentIndex = index;
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("modalImage");
            modal.style.display = "block";
            modalImg.src = images[currentIndex].src;
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex >= images.length) {
                currentIndex = 0;
            } else if (currentIndex < 0) {
                currentIndex = images.length - 1;
            }
            var modalImg = document.getElementById("modalImage");
            modalImg.src = images[currentIndex].src;
        }
    </script>
</x-app-layout>
