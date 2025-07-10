/*===================================================
  COLOR MODE
=====================================================*/ 

(() => {

  "use strict";

  const storedTheme = localStorage.getItem("theme");

  const getPreferredTheme = () => {

    if (storedTheme) {

      return storedTheme;
    }

    return window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";

  };

  const setTheme = function (theme) {

    if(theme === "auto" && window.matchMedia("(prefers-color-scheme: dark)").matches) {

      document.documentElement.setAttribute("data-bs-theme", "dark");

    } else {

      document.documentElement.setAttribute("data-bs-theme", theme);

    }

  };

  setTheme(getPreferredTheme());

  const showActiveTheme = (theme, focus = false) => {

    const themeSwitcher = document.querySelector("#bd-theme");

    if (!themeSwitcher) {

      return;

    }


    const themeSwitcherText = document.querySelector("#bd-theme-text");
    const activeThemeIcon = document.querySelector(".theme-icon-active i");
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);
    const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

    for (const element of document.querySelectorAll("[data-bs-theme-value]")) {

      element.classList.remove("active");

      element.setAttribute("aria-pressed", "false");

    }


    btnToActive.classList.add("active");
    btnToActive.setAttribute("aria-pressed", "true");

    activeThemeIcon.setAttribute("class", svgOfActiveBtn);

    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;

    themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

    if (focus) {

      themeSwitcher.focus();

    }

  };

  window.matchMedia("(prefers-color-scheme: dark)")

    .addEventListener("change", () => {

      if (storedTheme !== "light" || storedTheme !== "dark") {

        setTheme(getPreferredTheme());

      }

    });

  window.addEventListener("DOMContentLoaded", () => {

    showActiveTheme(getPreferredTheme());

    for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {

      toggle.addEventListener("click", () => {

        const theme = toggle.getAttribute("data-bs-theme-value");

        localStorage.setItem("theme", theme);

        setTheme(theme);

        showActiveTheme(theme, true);

      });

    }

  });

})();



$(document).ready(function() {

    /*==================================================================================== 
        LLAMADO DEL ENDPOINT DE PARA VISUALIZAR LOS REGISTROS DE LA BASE DE DATOS
                        CON LA RUTA DE LA API CONTACTOS
      ====================================================================================*/ 
    $.ajax({
        url: 'https://contactos.emauro.com.mx/api/contactos', 
        method: 'GET',
        dataType: 'json',
        success: function(response) {

          // console.log("response", response);
         
            let tbody = '';

            response.forEach((contacto, index) => {

                tbody += `
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td class="text-center">${contacto.nombre}</td>
                        <td class="text-center">${contacto.email}</td>
                        <td class="text-center">${contacto.telefono}</td>
                        <td class="text-center">${contacto.mensaje}</td>
                        <td class="text-center">${contacto.created_at}</td>
                        <td class="text-center">
                          
                            <button data-tooltip="tooltip" data-title="Delete Contact" class="btn btn-danger btn-sm delete-contact" data-id="${contacto.idContacto}">

                                <i class="bi bi-trash"></i>

                            </button>

                        </td>

                    </tr> `;
            });

            $('.tableContacts tbody').html(tbody);
            $('.tableContacts').DataTable({

             "pageLength": 10,
             scrollY: 300, 
             paging: true,
             "lengthMenu": [10, 15, 25, 50, 75, 100 ],
             language:{
             searchPlaceholder: "Search...",
             sSearch:'<i class="bi bi-search text-danger text-bold"></i>',
             buttons: {
              copy: 'Copiar',
              excel: 'Excel'
                }
            },

            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,

            dom: "<'row mb-3'<'col-sm-4'B><'col-sm-4'l><'col-sm-4'f>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row mt-3'<'col-sm-6'i><'col-sm-6 text-end'p>>",

            buttons: [{
                        extend: 'excel',
                        text: '<i class="bi bi-file-earmark-excel text-success"></i> Excel',
                        className: 'btn btn-light btn-md border border-1'
                    },{
                        extend: 'pdf',
                        text: '<i class="bi bi-file-earmark-pdf text-danger"></i> PDF',
                        className: 'btn btn-light btn-md border border-1'
                    },{
                        extend: 'colvis',
                        text: '<i class="bi bi-layout-three-columns text-primary"></i> Columns',
                        className: 'btn btn-light btn-md border border-1'
                    }],
                  initComplete: function () {

                      $("ul.pagination").addClass("pagination-sm justify-content-end");
                  },

                  "drawCallback": function(setting){

                      $("ul.pagination").addClass("pagination-sm justify-content-end");

                  }

          }); 



            /*=========================================================
               LLAMADO PROCESO DE ELIMINACION DENTRO DE LA DATATABLE
            ===========================================================*/ 
          $(document).on('click', '.delete-contact', function() {

                const id = $(this).data('id');

                Swal.fire({
                  title:"¿Are you sure you want to delete the contact?",
                  text:"¡ Deleting Record... !",
                  icon:"warning",
                  showCancelButton:true,
                  confirmButtonColor:"#3085d6",
                  cancelButtonColor:"#d33",
                  confirmButtonText: "Yes, delete "

                }).then((result) => {

                  if(result.isConfirmed){ 

                     eliminarContacto(id);
                  }

                });

            });

          // -----------------------------------------------------

        },

        error: function(xhr, status, error) {

            console.error("Error al cargar contactos:", error);

        }

    });



});


  /*=====================================================
                FUNCION DE ELIMINACION
    =======================================================*/ 

function eliminarContacto(id) {

    $.ajax({
        /*=====================================================
             ENDPOINT DE ELIMINACION CON EL ID DE REFERENCIA
          =======================================================*/ 
        url: 'https://contactos.emauro.com.mx/api/contactos/' + id,

        method: 'DELETE',

        success: function(response) {

            Swal.fire({
              position: "center",
              icon: "success",
              title: "¡The contact has been successfully deleted!",
              showConfirmButton: true,
              allowoutsideclick:false,
              confirmButtonText: "Acept"
              
            }).then((result)=> {

              if(result.value){

                location.reload();
              }

            });

        },

        error: function(xhr, status, error) {

            alert("Error al eliminar contacto");
        }

    });

}



/*=============================================
   DEFINICION DE DATATLE DE FORMA GENERICA
=============================================*/

$(".tablas").DataTable({

 "pageLength": 10,
 scrollY: 300, 
 paging: true,

 "lengthMenu": [10, 15, 25, 50, 75, 100 ],


 language:{
       // url: 'ajax/es-ES.json',
       searchPlaceholder: "Search...",
       sSearch:'<i class="bi bi-search text-danger text-bold"></i>',
         buttons: {
            copy: 'Copiar',
            excel: 'Excel'
        }
    },


    "responsive": true, 
    "lengthChange": true, 
    "autoWidth": false,

    dom: "<'row mb-3'<'col-sm-4'B><'col-sm-4'l><'col-sm-4'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row mt-3'<'col-sm-6'i><'col-sm-6 text-end'p>>",

    buttons: [
    // {
    //         extend: 'copy',
    //         text: '<i class="bi bi-clipboard text-info"></i> Copy',
    //         className: 'btn btn-light btn-md border border-1'
    //     },

        {
            extend: 'excel',
            text: '<i class="bi bi-file-earmark-excel text-success"></i> Excel',
            className: 'btn btn-light btn-md border border-1'
        },
        {
            extend: 'pdf',
            text: '<i class="bi bi-file-earmark-pdf text-danger"></i> PDF',
            className: 'btn btn-light btn-md border border-1'
        },
        // {
        //     extend: 'print',
        //     text: '<i class="bi bi-printer text-info"></i> Print',
        //     className: 'btn btn-light btn-md border border-1'
        // },
        {
            extend: 'colvis',
            text: '<i class="bi bi-layout-three-columns text-primary"></i> Columns',
            className: 'btn btn-light btn-md border border-1'
        }

    
    ],

    initComplete: function () {

        $("ul.pagination").addClass("pagination-sm justify-content-end");
    },


    "drawCallback": function(setting){

        $("ul.pagination").addClass("pagination-sm justify-content-end");

    }

})
