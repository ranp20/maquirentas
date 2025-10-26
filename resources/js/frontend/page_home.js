import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
  $('.filter-btn').click(function(){
    // --------------- Quitar la clase activa de todos los botones
    $('.filter-btn').removeClass('bg-gray-800').addClass('bg-blue-500');

    // --------------- Agregar la clase activa solo al clickeado
    $(this).removeClass('bg-blue-500').addClass('bg-gray-800 text-white');
    const id = $(this).data('id');
    const idformat = (id === 'all') ? 'all' : id;
    $.ajax({
      url: `/filter/${idformat}`,
      method: 'GET',
      beforeSend: function(){
        $('#itemsContainer').html(`
          <div class="flex justify-center items-center py-10">
            <div class="animate-spin rounded-full h-10 w-10 border-t-4 border-blue-500 border-solid"></div>
          </div>
        `);
      },
      success: function(data){
        let html = '';
        html = `<div class="grid grid-cols-1 md:grid-cols-4 gap-6">`;
        data.forEach(item => {
          html += `          
          <div class="max-w-sm bg-white border border-none rounded-lg shadow-sm">
            <a href="${item.routedetail}">
              <img class="rounded-t-lg" src="https://nomadadigital.me/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-09-at-14.34.49-768x576.jpeg.webp" alt="" />
            </a>
            <div class="p-4 text-left">
              <p class="grid grid-cols-2">
                <span class="text-base font-semibold">MARCA: </span>
                <span><a href="${item.routedetail}">${item.brand}</a></span>
              </p>
              <p class="grid grid-cols-2">
                <span class="text-base font-semibold">AÑO: </span>
                <span class="text-base">${item.year}</span>
              </p>
              <p class="grid grid-cols-2">
                <span class="text-base font-semibold">CAPACIDAD: </span>  
                <span class="text-base">${item.capacity}</span>
              </p>
              <p class="grid grid-cols-2">
                <span class="text-base font-semibold">PRECIO FOB: </span>  
                <span class="text-base">$${item.price_FOB}</span>
              </p>
              <p class="grid grid-cols-2">
                <span class="text-base font-semibold">PRECIO CIF: </span>  
                <span class="text-base">
                  <button class="view-detail bg-green-500 text-white px-3 py-1 rounded mt-2" data-id="${item.id}">
                    Ver detalle
                  </button>
                </span>
              </p>
            </div>
          </div>`;
        });
        html += `</div>`;
        $('#itemsContainer').html(html);
      },
      error: function(){
      $('#itemsContainer').html(`
        <div class="text-center text-red-500 py-6">
          <p class="font-medium">Ocurrió un error al cargar los productos.</p>
        </div>
      `);
      },
    });
  });
  // --------------- Ver detalle AJAX
  $(document).on('click', '.view-detail', function(){
    const id = $(this).data('id');
    $.get(`/item/${id}`, function(data){
      $('#modalTitle').text(data.brand);
      $('#modalContent').html(`
        <p><strong>Año:</strong> ${data.year}</p>
        <p><strong>Capacidad:</strong> ${data.capacity}</p>
        <p><strong>FOB:</strong> $${data.price_FOB}</p>
        <p><strong>CIF:</strong> $${data.price_CIF}</p>
      `);
      $('#detailModal').removeClass('hidden');
    });
  });

  $('#closeModal').click(function(){
    $('#detailModal').addClass('hidden');
  });
});

/* -------------- VALIDATING CAROUSELS WHEN ENTERING A CERTAIN SCREEN DIMENSION -------------- */  
let owlInitialized = false;
function initializeOwl(){
  if($(window).width() < 992){
    if(!owlInitialized){
      /* -------------- CARRUSEL OWLCAROUSEL - LISTADO DE CATEGORÍAS DE (TENDENCIAS) -------------- */
      $('#filterCategTabs').owlCarousel({
        loop: true,
        margin: 10,
        // autoplay: true,
        // autoplayTimeout: 2000,
        // autoplayHoverPause: false,
        nav: false,
        dots: false,
        responsiveClass: true,
        startPosition: 0,
        center: false,
        responsive:{
          0:{
            items: 3,
            nav: true,
            margin: 10,
          },
          500:{
            margin: 10,
            items: 3
          },
          900:{
            items: 4
          },
        }
      });
      owlInitialized = true;
    }
  }else{

    if(owlInitialized){
      // -------------- DESACTIVAR PRODUCT_FILTER CARRUSEL
      $('#filterCategTabs').trigger('destroy.owl.carousel');
      $('#filterCategTabs').removeClass('owl-loaded owl-drag');
      $('#filterCategTabs').find('.owl-stage-outer').children().unwrap();

      owlInitialized = false;
    }
  }
}
initializeOwl();
$(window).resize(function(){
  initializeOwl();
});