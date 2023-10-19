<footer class="bg-gray-900">	
        <div class="container max-w-6xl mx-auto flex items-center px-2 py-8">

            <div class="w-full mx-auto flex flex-wrap items-center">
                <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                    <a class="text-gray-900 no-underline hover:text-gray-900 hover:no-underline" href="#">
                        👻 <span class="text-base text-gray-200">Ghostwind CSS</span>
                    </a>
                </div>
                <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                    <ul class="list-reset flex justify-center flex-1 md:flex-none items-center">
                      <li>
                        <a class="inline-block py-2 px-3 text-white no-underline" href="#">Active</a>
                      </li>
                      <li>
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3" href="#">link</a>
                      </li>
                      <li>
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3" href="#">link</a>
                      </li>
                        <li>
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3" href="#">link</a>
                      </li>
                    </ul>
                </div>
            </div>
        

        
        </div>
</footer>

    <script>
      const callback = function (entries) {
        entries.forEach((entry) => {
            console.log(entry);

            if (entry.isIntersecting) {
              entry.target.classList.remove("animate-fadeout");
            entry.target.classList.add("animate-fadeIn");
            } else {
            entry.target.classList.remove("animate-fadeIn");
            entry.target.classList.add("animate-fadeout");
            }
        });
        };

        const observer = new IntersectionObserver(callback);

        const targets = document.querySelectorAll(".js-show-on-scroll");
        targets.forEach(function (target) {
        target.classList.add("opacity-0");
        observer.observe(target);
        });
        
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>