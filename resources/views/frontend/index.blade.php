<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Filtrado dinámico')</title>
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
      <section class="container max-w-6xl mx-auto px-4 py-12">
        <header class="text-center py-4 mb-10">
          <div class="sec-header">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">NUESTRAS MÁS RECIENTES GRÚAS</h2>
            <p></p>
          </div>
        </header>
        <div class="sec-content w-box">
          <!-- Botones de categorías -->
          <div class="flex justify-center items-start flex-row flex-wrap gap-4 mb-8 owl-carousel owl-theme mx-auto" id="filterCategTabs">
            <button id="all" class="filter-btn bg-gray-800 text-white px-4 py-2 rounded-full item hover:bg-gray-800 font-medium" data-id="all">Todos</button>
            @foreach($categories as $cat)
              <button class="filter-btn bg-blue-500 text-white px-4 py-2 rounded-full item hover:bg-gray-800 font-medium" data-id="{{ $cat->id }}">
                {{ $cat->name }}
              </button>
            @endforeach
          </div>
          <!-- Contenedor de items -->
          <div id="itemsContainer">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
              @foreach($items as $item)
                <div class="max-w-sm bg-white border border-none rounded-lg shadow-sm">
                  <a href="{{ route('item.show', $item->id) }}">
                    <img class="rounded-t-lg" src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp" alt="" />
                  </a>
                  <div class="p-4 text-left">
                    <p class="grid grid-cols-2">
                      <span class="text-base font-semibold">MARCA: </span>
                      <span><a href="{{ route('item.show', $item->id) }}">{{ $item->brand }}</a></span>
                    </p>
                    <p class="grid grid-cols-2">
                      <span class="text-base font-semibold">AÑO: </span>
                      <span class="text-base">{{ $item->year }}</span>
                    </p>
                    <p class="grid grid-cols-2">
                      <span class="text-base font-semibold">CAPACIDAD: </span>  
                      <span class="text-base">{{ $item->capacity }}</span>
                    </p>
                    <p class="grid grid-cols-2">
                      <span class="text-base font-semibold">PRECIO FOB: </span>  
                      <span class="text-base">${{ $item->price_FOB }}</span>
                    </p>
                    <p class="grid grid-cols-2">
                      <span class="text-base font-semibold">PRECIO CIF: </span>  
                      <span class="text-base">
                        <button class="view-detail bg-green-500 text-white px-3 py-1 rounded mt-2" data-id="{{ $item->id }}">
                          Ver detalle
                        </button>
                      </span>
                    </p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <!-- Modal de detalle -->
          <div id="detailModal" class="hidden fixed inset-0 bg-black/70 flex justify-center items-center">
            <div class="bg-white p-6 rounded shadow-lg w-96">
              <h2 id="modalTitle" class="text-xl font-bold mb-2"></h2>
              <p id="modalContent"></p>
              <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
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
  @vite(['resources/js/app.js', 'resources/js/frontend/page_home.js'])
</body>
</html>