<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Filtrado dinámico')</title>
  @vite(['resources/css/app.css'])
</head>
<body>
  <header>
    <nav>
      <section>
        <div class="h-logo-content container max-w-5xl mx-auto px-2 py-3 flex items-center justify-between">
          <a href="#" class="mx-auto">
            <img class="w-32 h-auto" src="https://nomadadigital.me/wp-content/uploads/2024/06/Logo-MaquiFeria-e1720158368759-300x151.png" title="logo maquirenta" alt="logo_maquirenta" width="100" height="100" loading="lazy">
          </a>
        </div>
      </section>
    </nav>
  </header>
  <main class="bg-gray-50">
    <section class="container max-w-6xl mx-auto px-4 py-12">
      <header class="text-center mb-10">
        <div class="sec-header">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">NUESTRAS MÁS RECIENTES GRÚAS</h2>
          <p></p>
        </div>
      </header>
      <div class="sec-content w-box">
        <!-- Botones de categorías -->
        <div class="flex justify-center items-start flex-row flex-wrap gap-4 mb-8 owl-carousel owl-theme" id="filterCategTabs">
          <button id="all" class="filter-btn bg-gray-800 text-white px-4 py-2 rounded item" data-id="all">Todos</button>
          @foreach($categories as $cat)
            <button class="filter-btn bg-blue-500 text-white px-4 py-2 rounded item" data-id="{{ $cat->id }}">
              {{ $cat->name }}
            </button>
          @endforeach
        </div>
        <!-- Contenedor de items -->
        <div id="itemsContainer" class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @foreach($items as $item)
            <div class="bg-white p-4 rounded-lg shadow text-center">
              <h2 class="text-lg font-semibold">
                <a href="{{ route('item.show', $item->id) }}">
                  {{ $item->brand }}
                </a>
              </h2>
              <p>Año: {{ $item->year }}</p>
              <p>Capacidad: {{ $item->capacity }}</p>
              <p>FOB: ${{ $item->price_FOB }}</p>
              <p>CIF: ${{ $item->price_CIF }}</p>
              <button class="view-detail bg-green-500 text-white px-3 py-1 rounded mt-2" data-id="{{ $item->id }}">
                Ver detalle
              </button>
            </div>
          @endforeach
        </div>

        <!-- Modal de detalle -->
        <div id="detailModal" class="hidden fixed inset-0 bg-black/70 flex justify-center items-center">
          <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 id="modalTitle" class="text-xl font-bold mb-2"></h2>
            <p id="modalContent"></p>
            <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
          </div>
        </div>
        <!-- 
        <div class="cards-container">
          <article class="card">
            <div class="card-content">
              <div class="card-photo">
                <a href="#">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-12.45.57-1-768x1024.jpeg.webp" alt="" width="100" height="100" loading="lazy">
                </a>
              </div>
              <div class="product-details">
                <div class="detail-item">
                  <span class="label">MARCA: </span>
                  <span class="value">VMX</span>
                </div>
                <div class="detail-item">
                  <span class="label">AÑO: </span>
                  <span class="value">NUEVO 2024</span>
                </div>
                <div class="detail-item">
                  <span class="label">CAPACIDAD: </span>
                  <span class="value">3 TN</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO FOB: </span>
                  <span class="value">$25,000.00</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO CIF: </span>
                  <span class="value">
                    <a href="#">
                      <span>HAZ CLICK AQUÍ</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </article>
          <article class="card">
            <div class="card-content">
              <div class="card-photo">
                <a href="#">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-12.45.57-1-768x1024.jpeg.webp" alt="" width="100" height="100" loading="lazy">
                </a>
              </div>
              <div class="product-details">
                <div class="detail-item">
                  <span class="label">MARCA: </span>
                  <span class="value">VMX</span>
                </div>
                <div class="detail-item">
                  <span class="label">AÑO: </span>
                  <span class="value">NUEVO 2024</span>
                </div>
                <div class="detail-item">
                  <span class="label">CAPACIDAD: </span>
                  <span class="value">3 TN</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO FOB: </span>
                  <span class="value">$25,000.00</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO CIF: </span>
                  <span class="value">
                    <a href="#">
                      <span>HAZ CLICK AQUÍ</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </article>
          <article class="card">
            <div class="card-content">
              <div class="card-photo">
                <a href="#">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-12.45.57-1-768x1024.jpeg.webp" alt="" width="100" height="100" loading="lazy">
                </a>
              </div>
              <div class="product-details">
                <div class="detail-item">
                  <span class="label">MARCA: </span>
                  <span class="value">VMX</span>
                </div>
                <div class="detail-item">
                  <span class="label">AÑO: </span>
                  <span class="value">NUEVO 2024</span>
                </div>
                <div class="detail-item">
                  <span class="label">CAPACIDAD: </span>
                  <span class="value">3 TN</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO FOB: </span>
                  <span class="value">$25,000.00</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO CIF: </span>
                  <span class="value">
                    <a href="#">
                      <span>HAZ CLICK AQUÍ</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </article>
          <article class="card">
            <div class="card-content">
              <div class="card-photo">
                <a href="#">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-12.45.57-1-768x1024.jpeg.webp" alt="" width="100" height="100" loading="lazy">
                </a>
              </div>
              <div class="product-details">
                <div class="detail-item">
                  <span class="label">MARCA: </span>
                  <span class="value">VMX</span>
                </div>
                <div class="detail-item">
                  <span class="label">AÑO: </span>
                  <span class="value">NUEVO 2024</span>
                </div>
                <div class="detail-item">
                  <span class="label">CAPACIDAD: </span>
                  <span class="value">3 TN</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO FOB: </span>
                  <span class="value">$25,000.00</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO CIF: </span>
                  <span class="value">
                    <a href="#">
                      <span>HAZ CLICK AQUÍ</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </article>
          <article class="card">
            <div class="card-content">
              <div class="card-photo">
                <a href="#">
                  <img src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-04-at-12.45.57-1-768x1024.jpeg.webp" alt="" width="100" height="100" loading="lazy">
                </a>
              </div>
              <div class="product-details">
                <div class="detail-item">
                  <span class="label">MARCA: </span>
                  <span class="value">VMX</span>
                </div>
                <div class="detail-item">
                  <span class="label">AÑO: </span>
                  <span class="value">NUEVO 2024</span>
                </div>
                <div class="detail-item">
                  <span class="label">CAPACIDAD: </span>
                  <span class="value">3 TN</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO FOB: </span>
                  <span class="value">$25,000.00</span>
                </div>
                <div class="detail-item">
                  <span class="label">PRECIO CIF: </span>
                  <span class="value">
                    <a href="#">
                      <span>HAZ CLICK AQUÍ</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </article>
        </div>
         -->
      </div>
    </section>
  </main>
  @vite(['resources/js/app.js', 'resources/js/frontend/page_home.js'])
</body>
</html>