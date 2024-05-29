<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>App móvil simulada</title>
        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{!! asset('css/styles.css') !!}" />
        <style>
            body {
                padding-bottom: 70px; /* Altura del pie de página */
            }
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #f8f9fa;
                padding: 10px 0;
            }
            a {
                color: #e28125;
                text-decoration: none;
                background-color: transparent;
            }
        </style>
        <style>
        .tree-container {
     
      overflow: auto; /* Habilitar el desplazamiento */
      border: 1px solid #ccc; /* Borde opcional */
    }
    .node circle {
      fill: #fff;
      stroke: steelblue;
      stroke-width: 2px;
    }

    .node text {
      font: 12px sans-serif;
    }

    .link {
      fill: none;
      stroke: #ccc;
      stroke-width: 2px;
    }
  </style>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Image and text -->
            <nav class="navbar navbar-orange bg-orange">
                <a class="navbar-brand text-light text-uppercase">
                    <img
                        src="{!! asset('img/logo.png') !!}"
                        width="30"
                        height="30"
                        class="d-inline-block align-top"
                        alt=""
                    />
                    Namaiwajana
                </a>
            </nav>
            <div class="mx-3">
                <h5 class="display-4 my-2">Nombre Comunidad</h5>

                <ul id="miLista" class="nav nav-tabs">
                    <li id="informacion" class="nav-item">
                        <a class="nav-link active">Comunidad</a>
                    </li>
                    <li id="ubicacion" class="nav-item">
                        <a class="nav-link">Casta</a>
                    </li>
                    <li id="linaje" class="nav-item">
                        <a class="nav-link ">Linaje</a>
                    </li>
                    <li id="ra" class="nav-item">
                        <a class="nav-link">RA</a>
                    </li>
                </ul>
            </div>
            <!-- Contenido de la aplicación -->

           
                <div class="row mx-1 my-2" id="contenido-informacion" >
                  
                    <div class="col-md-2">
                    <h3>Informacion</h3>
                        <img
                            src="https://th.bing.com/th/id/R.67aa7ac83a27624c8c1ea1baef347da5?rik=QW1NhHohqfLknQ&pid=ImgRaw&r=0"
                            class="img-fluid"
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted lead text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer nec odio. Praesent libero. Sed cursus
                            ante dapibus diam. Sed nisi.
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer nec odio. Praesent libero. Sed cursus
                            ante dapibus diam. Sed nisi.
                        </p>
                    </div>
                </div>
                <div class="row mx-1 my-2" id="contenido-linaje" style="display: none;">
                  
                    <div class="col-md-12 tree-container" >
                    <h3>Linaje</h3>
                    <svg id="arbol-genealogico" width="100%" height="100%"></svg>
                    </div>
                    
                </div>
                <div class="row mx-1 my-2" id="contenido-ubicacion" style="display: none;">
                  
                    <div class="col-md-2">
                    <h3>Ubicacion</h3>
                        <img
                            src="https://th.bing.com/th/id/R.67aa7ac83a27624c8c1ea1baef347da5?rik=QW1NhHohqfLknQ&pid=ImgRaw&r=0"
                            class="img-fluid"
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted lead text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer nec odio. Praesent libero. Sed cursus
                            ante dapibus diam. Sed nisi.
                        </p>
                    </div>
                </div>
                <div class="row mx-1 my-2" id="contenido-ra" style="display: none;">
                  
                    <div class="col-md-2">
                    <h3>Ra</h3>
                        <img
                            src="https://th.bing.com/th/id/R.67aa7ac83a27624c8c1ea1baef347da5?rik=QW1NhHohqfLknQ&pid=ImgRaw&r=0"
                            class="img-fluid"
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted lead text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer nec odio. Praesent libero. Sed cursus
                            ante dapibus diam. Sed nisi.
                        </p>
                    </div>
                </div>
            
        </div>
<!-- Modal -->
 <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información del Nodo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="modal-body">
                <!-- Aquí se mostrará la información del nodo -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
        <!-- Pie de página con botones -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-block">
                            Botón 1
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-block">
                            Botón 2
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-block">
                            Botón 3
                        </button>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery y Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){

            $("#miLista li").click(function(){
                // Remover la clase 'active' de todos los elementos <a> dentro de la lista
                $("#miLista li a").removeClass("active");
                // Agregar la clase 'active' al elemento <a> clickeado
                $(this).find("a").addClass("active");
            });
            $("#informacion").click(function(){
                $("#contenido-informacion").show();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").hide();
            });
            $("#linaje").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").show();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").hide();
            });
            $("#ubicacion").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").show();
                $("#contenido-ra").hide();
            });
            $("#ra").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").show();
            });
        });
    </script>
    <script src="https://d3js.org/d3.v7.min.js"></script>


    <script>
    var treeData = {
      "name": "Abuelo",
      "children": [
        {
          "name": "Padre",
          "children": [
            { "name": "Hijo 1", "info": "Información sobre Hijo 1" },
            { "name": "Hijo 2", "info": "Información sobre Hijo 2" }
          ]
        },
        {
          "name": "Tío",
          "children": [
            { "name": "Sobrino 1", "info": "Información sobre Sobrino 1" },
            { "name": "Sobrino 2", "info": "Información sobre Sobrino 2" }
          ]
        }
      ]
    };

    var margin = {top: 40, right: 90, bottom: 50, left: 90},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var svg = d3.select("#arbol-genealogico")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.top + margin.bottom)
      .append("g")
      .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");

    var treemap = d3.tree()
        .size([height, width]);

    var nodes = d3.hierarchy(treeData, function(d) { return d.children; });
    nodes = treemap(nodes);

    var link = svg.selectAll(".link")
        .data( nodes.descendants().slice(1))
      .enter().append("path")
        .attr("class", "link")
        .attr("d", function(d) {
           return "M" + d.y + "," + d.x
             + "C" + (d.y + d.parent.y) / 2 + "," + d.x
             + " " + (d.y + d.parent.y) / 2 + "," + d.parent.x
             + " " + d.parent.y + "," + d.parent.x;
           });

    var node = svg.selectAll(".node")
        .data(nodes.descendants())
      .enter().append("g")
        .attr("class", "node")
        .attr("transform", function(d) { 
          return "translate(" + d.y + "," + d.x + ")"; })
          .on("click", function(d) {
      showModal(d); // Pasar el objeto de datos al hacer clic en el nodo
    });// Agregar evento click al nodo

    node.append("circle")
        .attr("r", 10);

    node.append("text")
        .attr("dy", ".35em")
        .attr("x", function(d) { return d.children ? -13 : 13; })
        .style("text-anchor", function(d) { return d.children ? "end" : "start"; })
        .text(function(d) { return d.data.name; });

    function showModal(data) {
        console.log(data.data);
        if (data.info) {
    document.getElementById("modal-body").innerText = data.info;
    $('#myModal').modal('show');
  } else {
    document.getElementById("modal-body").innerText = "No hay información disponible para este nodo.";
    $('#myModal').modal('show');
  }
    }
  </script>

    </body>
</html>
