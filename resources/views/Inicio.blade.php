<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Namaiwajana</title>

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{!! asset('css/styles.css') !!}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                padding-bottom: 70px; /* Altura del pie de página */
                background-image: url('{{ asset("img/fondo.png") }}');
                background-size: cover; /* Ajusta el tamaño para cubrir todo el contenedor */
                background-position: center; /* Centra la imagen */
                height: 100vh; /* Altura igual al 100% del viewport height */
            }
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #f8f9fa;
                
            }
            a {
                color: #e28125;
                text-decoration: none;
                background-color: transparent;
            }
            .custom-bg {
        background: linear-gradient(135deg, #ff8c00, #000000);
        color: white; /* Cambia el color del texto si es necesario */
        padding: 10px; /* Ajusta el padding según tus necesidades */
    }

    .fondo_contenedor{
        background: linear-gradient(48deg, #272525, #414040);
        color: white; /* Cambia el color del texto si es necesario */
        padding: 10px; /* Ajusta el padding según tus necesidades */
        border-radius: 20px;
    }

    img{
        border-radius: 20px;
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

<style>
    
    #mensaje-celular {
      display: none; /* Ocultar el mensaje inicialmente */
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
    }
    @media (max-width: 767px) {
      body {
       background-image: url('{{ asset("img/fondo.jpg") }}');
        background-size: cover; /* Ajusta el tamaño para cubrir todo el contenedor */
        background-position: center; /* Centra la imagen */
        height: 100vh; /* Altura igual al 100% del viewport height */
      }
    }
  </style>
    </head>
    <body>
        <div class="container-fluid">
        <div id="mensaje-celular" class="alert alert-info">
    Esta aplicación es visible solo mediante celular.
  </div>
            <!-- Image and text -->
            <nav class="navbar navbar-orange bg-orange">
                <a class="navbar-brand text-light text-uppercase">
                    <img
                        src="{!! asset('img/logo.png') !!}"
                        width="40"
                        height="40"
                        class="d-inline-block align-top"
                        alt=""
                    />
                    Bienvenido Viajero<br>
                    Namaiwajana
                </a>
            </nav>
            <div class="mx-3">
                <h5 class="display-4 my-2 nombre_comunidad text-light py-3"></h5>

                <ul id="miLista" class="nav nav-tabs bg-dark">
                    <li  class="nav-item informacion">
                        <a class="nav-link active">Comunidad</a>
                    </li>
                    <li  class="nav-item ubicacion">
                        <a class="nav-link">Casta</a>
                    </li>
                    <li  class="nav-item linaje">
                        <a class="nav-link ">Linaje</a>
                    </li>
                    <li  class="nav-item ra">
                        <a class="nav-link">RA</a>
                    </li>
                </ul>
            </div>
            <!-- Contenido de la aplicación -->

           
                <div class="row mx-1 my-2 fondo_contenedor " id="contenido-informacion" >
                  
                    <div class="col-md-2">
                    <h3 class="nombre_comunidad pt-2">Informacion</h3>
                        <img
                            id="imagen-dinamica"
                            src=""
                            class="img-fluid "
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class=" lead text-justify text-ligth pt-2" id="descripcion_comunidad"> 
                           data
                        </p>
                    </div>
                </div>
                <div class="row mx-1 my-2 bg-light" id="contenido-linaje" style="display: none;">
                  
                    <div class="col-md-12 tree-container" >
                    <h3>Linaje</h3>
                    <svg id="arbol-genealogico" width="100%" height="100%"></svg>
                    </div>
                    
                </div>
                <div class="row mx-1 my-2 fondo_contenedor" id="contenido-ubicacion" style="display: none;">
                  
                    <div class="col-md-2">
                    <h3 id="nombre_linaje pt-2">Ubicacion</h3>
                        <img
                            id="imagen-dinamica_logo"
                            src=""
                            class="img-fluid"
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class=" lead text-justify text-ligth pt-2" id="descripcion_linaje">
                            data
                        </p>
                    </div>
                </div>
                <div class="row mx-1 my-2 fondo_contenedor" id="contenido-ra" style="display: none;">
                  
                    <div class="col-md-2">
                    <h3>Ra</h3>
                        <img
                            src="https://th.bing.com/th/id/R.193cf242e4cc743b87327daa3f86d0fe?rik=51G%2fDOG4Qoq5kA&riu=http%3a%2f%2fwww.channelbiz.es%2fwp-content%2fuploads%2f2014%2f01%2fRealidad-Aumentada.png&ehk=ceAM8to7TStFYlttV1W9UMV5lN8sdOFuTWt3P%2f6xeHI%3d&risl=&pid=ImgRaw&r=0"
                            class="img-fluid"
                            alt="Imagen"
                        />
                    </div>
                    <div class="col-md-6">
                        <p class="text-ligth pt-2 lead text-justify">
                            Proximamente se podra visualizar realidad aumentada de la comunidad seleccionada
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
                <div class="modal-body d-flex justify-content-center align-items-center" id="modal-body">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="" alt="Card image cap" id="card_foto">
                    <div class="card-body">
                        <h5 class="card-title" id="card_nombre">Card title</h5>
                        <p class="card-text" id="card_descripcion">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" id="card_nacimiento">Cras justo odio</li>
                        <li class="list-group-item" id="card_difuncion">Dapibus ac facilisis in</li>
                        <li class="list-group-item" id="card_memoria">Vestibulum at eros</li>
                    </ul>
                    </div>
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
                <div class="row custom-bg py-3">
                    <div class="col">
                        <button type="button" class="btn text-light btn-block informacion">
                        <i class="fas fa-users fa-2x"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn text-light btn-block ubicacion ">
                        <i class="fas fa-crown fa-2x"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn text-light btn-block  linaje">
                        <i class="fas fa-tree fa-2x"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn text-light btn-block ra">
                        <i class="fas fa-camera fa-2x"></i>
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
            $(".informacion").click(function(){
                $("#contenido-informacion").show();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").hide();
            });
            $(".linaje").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").show();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").hide();
            });
            $(".ubicacion").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").show();
                $("#contenido-ra").hide();
            });
            $(".ra").click(function(){
                $("#contenido-informacion").hide();
                $("#contenido-linaje").hide();
                $("#contenido-ubicacion").hide();
                $("#contenido-ra").show();
            });
        });
    </script>
    <script src="https://d3js.org/d3.v7.min.js"></script>


   
<script>
    // Convertir el array PHP a JSON
    let consulta = {!! json_encode($consulta) !!};

  
    
    consulta=consulta[0]
    console.log(consulta);
  
    var treeData = JSON.parse(consulta.personas);
    console.log("arbol",treeData);
    $(".nombre_comunidad").text(consulta.Nombre);
    $("#descripcion_comunidad").text(consulta.Descripcion);
    $("#nombre_linaje").text(consulta.nombre);
    $("#descripcion_linaje").text(consulta.descripcion);
    $('#imagen-dinamica').attr('src', consulta.Fotografia);
    $('#imagen-dinamica_logo').attr('src', consulta.logo);


</script>
<script>
   console.log(treeData);

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
        .size([width, height]);

    var nodes = d3.hierarchy(treeData, function(d) { return d.children; });
    nodes = treemap(nodes);

    var link = svg.selectAll(".link")
    .data(nodes.descendants().slice(1))
  .enter().append("path")
    .attr("class", "link")
    .attr("d", function(d) {
       return "M" + d.x + "," + d.y  // Cambiando d.x y d.y
         + "C" + (d.x + d.parent.x) / 2 + "," + d.y
         + " " + (d.x + d.parent.x) / 2 + "," + d.parent.y
         + " " + d.parent.x + "," + d.parent.y;
       });

       var node = svg.selectAll(".node")
            .data(nodes.descendants())
            .enter().append("g")
            .attr("class", "node")
            .attr("transform", function(d) { 
            return "translate(" + d.x + "," + d.y + ")"; })  // Cambiando d.x y d.y
            .on("click", function(d) {
                showModal(d.target.__data__.data)
              
            });

    node.append("circle")
        .attr("r", 1);

    node.append("text")
        .attr("dy", ".35em")
        .attr("x", function(d) { return d.children ? -13 : 13; })
        .style("text-anchor", function(d) { return d.children ? "end" : "start"; })
        .text(function(d) { 
         
            return d.data.name;
         });

    function showModal(data) {
        console.log(data);
        if ('informacion' in data) {
        // Hacer algo si la clave 'informacion' está presente
     
            $("#exampleModalLabel").text(data.name);
            $("#card_nombre").text(data.informacion.nombre_persona);
            $("#card_descripcion").text(data.informacion.descripcion_persona);
            $("#card_nacimiento").text("Nacimiento: "+data.informacion.nacimiento);
            $("#card_difuncion").text("Difuncion: "+data.informacion.difuncion);
            $("#card_memoria").text("Memorias: "+data.informacion.memoria);
            $('#card_foto').attr('src', data.informacion.fotografia);
        $('#myModal').modal('show');
        // Aquí puedes agregar más acciones según sea necesario
    }
   
    }
  </script>
    </body>
</html>
