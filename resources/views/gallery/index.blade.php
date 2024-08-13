<x-app-layout>
    @section('title')
        {{ 'Galeria' }}
    @endsection

    <x-header title="Galeria" />

    <div class="p-6">
        <section class="flex flex-wrap gap-2 w-full mt-6 p-6 justify-center">
            {{--Zdjęcia--}}
            @foreach($photos as $photo)
                <img class="md:h-80 rounded-lg cursor-pointer gallery-img" src="{{$photo->getURLImage()}}" alt="" onclick="openModal({{$loop->index}})">
            @endforeach
        </section>

        <!-- Modal -->
        <div id="myModal" class="modal" onclick="closeModal(event)">
            <span class="close" onclick="closeModal(event)">&times;</span>
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
            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("modalImage");
            modal.style.display = "block";
            modalImg.src = images[currentIndex].src;
            document.addEventListener('keydown', handleKeydown);
        }

        function closeModal(event) {
            const modal = document.getElementById("myModal");
            if (!event || event.target === modal || event.target.classList.contains('close')) {
                modal.style.display = "none";
                document.removeEventListener('keydown', handleKeydown);
            }
        }

        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex >= images.length) {
                currentIndex = 0;
            } else if (currentIndex < 0) {
                currentIndex = images.length - 1;
            }
            const modalImg = document.getElementById("modalImage");
            modalImg.src = images[currentIndex].src;
        }

        function handleKeydown(event) {
            if (event.key === 'ArrowLeft') {
                changeImage(-1);
            } else if (event.key === 'ArrowRight') {
                changeImage(1);
            } else if (event.key === 'Escape') {
                closeModal();
            }
        }
    </script>
</x-app-layout>
