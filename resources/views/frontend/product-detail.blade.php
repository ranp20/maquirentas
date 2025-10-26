<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Detalle de producto' }}</title>
  @vite(['resources/css/app.css'])
</head>
<body>
  <header class="border-b-1 border-gray-100">
    <nav>
      <section>
        <div class="h-logo-content container max-w-5xl mx-auto px-2 py-3 flex items-center justify-between">
          <a href="{{ url('/') }}" class="mx-auto">
            <img class="w-32 h-auto" src="https://nomadadigital.me/wp-content/uploads/2024/06/Logo-MaquiFeria-e1720158368759-300x151.png" title="logo maquirenta" alt="logo_maquirenta" width="100" height="100" loading="lazy">
          </a>
        </div>
      </section>
    </nav>
  </header>
  <div class="flex flex-col min-h-screen">
    <main class="bg-gray-100">
      <section class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
        <!-- Galería de imágenes -->
        <div>
          <a class="bg-gray-100 rounded-xl p-1 flex justify-center MagicZoom" id="photo-product" data-options="cssClass: mz-show-arrows;">
            <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp" alt="Zip Tote Basket" class="rounded-lg max-h-[400px] object-contain">
          </a>
          <div class="flex justify-center gap-3 mt-4 cGalleryScroll">
            <div class="cGalleryScroll__c">
              @for ($i = 0; $i < 5; $i++)
                <a data-zoom-id="photo-product" class="border-1 border-transparent rounded-lg m-1 hover:border-blue-600 overflow-hidden item" href="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp" data-image="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp">
                </a>
              @endfor
            </div>
            <button class="scroll-btn prev"></button>
            <button class="scroll-btn next"></button>
          </div>
        </div>
        <!-- Información del producto -->
        <div>
          <h1 class="mt-5 text-4xl font-semibold text-gray-800">{{ $item->brand }}</h1>
          <p class="mt-5 text-2xl text-gray-900 font-medium">Precio FOB</p>
          <h2 class="mt-5 text-4xl text-gray-800 font-semibold"> ${{ $item->price_FOB }}</h2>
          <!-- Descripción -->
          <p class="mt-5 text-gray-700 leading-relaxed"></p>
          <!-- Botón de compra -->
          <div class="mt-6 flex items-center gap-3">
            <a href="#" class="w-full text-white py-3 px-5 rounded-full bg-blue-600 hover:bg-blue-700 transition-all text-center flex justify-center">
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                </svg>
              </span> 
              <span class="uppercase font-medium">Contáctanos</span>
            </a>
            <a href="{{ url('/') }}" class="w-full py-3 px-5 rounded-full transition-all text-white bg-blue-600 hover:bg-blue-700 text-center flex justify-center">
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                  <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg>
              </span> 
              <span class="uppercase font-medium">Regresar al home</span>
            </a>
          </div>
        </div>
      </section>
    </main>
    <footer class="border-t-1 border-gray-100">
      <section class="container max-w-6xl mx-auto px-4 py-5">
        <div class="grid grid-cols-2 justify-between">
          <p class="text-left text-gray-600 font-bold">Maquisale</p>
          <p class="text-right text-gray-600 font-bold">Todos los derechos reservados.</p>
        </div>
      </section>
    </footer>
  </div>
  @vite(['resources/js/app.js', 'resources/js/frontend/page_product-detail.js'])
</body>
</html>