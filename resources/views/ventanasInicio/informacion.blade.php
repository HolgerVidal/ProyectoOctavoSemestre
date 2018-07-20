
<div class="blog-single">
    <!-- post begin -->
    <article>
        <div class="post-content">
            <div class="post-title">
                @if(isset($opciones))
                     @foreach ($opciones as $n)
                        @if($n->nombre =="titulo2")
                            <h1>{{$n->valor}}</h1>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="post-metadata">                                        
                <span class="posted-on">
                    <i class="fa fa-clock-o"></i>
                    <?php echo date("Y-m-d");?>
                </span>
                <span class="byline">
                    <i class="fa fa-user"></i>
                    <a href="#">Autor</a>
                </span>
                <span class="comment-link">
                  @if(isset($comentario)) 
                    <i class="fa fa-comments-o"></i>
                     @foreach($comentario as $n )                                           
                     @endforeach 
                     <a href="#">{{$n->idcomentario}} comentarios</a>
                      
                  @endif  
                </span>    
            </div>
            <div class="hr"></div>
            <div class="post-entry">
            <div id="informacion_general"></div>

                <!-- <p>
                    La metodología EDER es un diseño para soluciones de infraestructura aplicable a 
                    proyectos de implementación tecnológica, se la ha identificado con el acrónimo 
                    EDER por las siglas de las fases que la conforman: Estudio, Diseño, Ejecución y Revisión.
                </p>
                <h3>ESTUDIO</h3>
                <p style="text-align: justify;">
                    Una infraestructura tecnológica tiene como objetivo satisfacer las necesidades de 
                    negocio de una organización, de tal forma que los procesos se vuelvan más eficientes, 
                    facilitando las comunicaciones y el intercambio de información. En esta etapa se 
                    plantean dos actividades. 
                </p>
                <div style="padding-left: 2%">
                    <h4>ANÁLISIS DE LA ORGANIZACIÓN</h4>
                    <p style="text-align: justify;">
                        El trabajo comienza analizando todos los componentes de la organización, así como los 
                        requisitos que les permitan alcanzar los objetivos organizacionales, ya que la 
                        infraestructura es siempre parte de un sistema mayor.     
                    </p>

                    <h4>ANÁLISIS DE LOS REQUISITOS</h4>
                    <p style="text-align: justify;">
                        Se centra e intensifica especialmente los aspectos de servicio de comunicación, 
                        soporte a la información, servicios de procesamiento de datos, entre otros.     
                    </p>                                                          
                </div>

                <h3>DISEÑO</h3>
                <p>
                    Traduce los requisitos en una representación técnica de la infraestructura a 
                    implantarse, considerando la calidad (normas, estándares, entre otros) requerida 
                    antes que comience la ejecución. Se debe estipular una arquitectura que sea robusta 
                    pero flexible, de tal forma que permita cambios en el futuro. Se detallarán claramente l
                    as características de los componentes de hardware y software que se integrarán. 
                    Será necesario determinar en esta etapa un cronograma de trabajo que contemple desde la 
                    ejecución hasta el proceso de pruebas respectivas. 
                </p>
                <h3>EJECUCIÓN </h3>
                <p>
                    Se desarrolla partiendo del diseño de la solución. Se debe implementar en base a la 
                    arquitectura proyectada en la fase anterior, integrando los diferentes componentes 
                    de hardware y software, y siguiendo estándares de calidad de acuerdo a los componentes 
                    y actividades planificadas.       
                </p>

                <h3>REVISIÓN</h3> 
                <p>
                    Para Morales y Cedeño (2017) la revisión es una fase que también comprende dos 
                    actividades, cuya finalidad es verificar el correcto funcionamiento de la 
                    solución de infraestructura tecnológica desarrollada, tanto en ambiente no 
                    productivo, como en producción. Las actividades son.
                </p>

                <div style="padding-left: 2%">
                    <h4>PRUEBAS EN FRÍO</h4>
                    <p>
                        Son verificaciones de acuerdo a diferentes tipos de pruebas planificadas 
                        para comprobar la integración de cada uno de los diferentes componentes como 
                        parte de la solución propuesta.
                    </p>
                    <h4>PRUEBAS EN CALIENTE</h4>
                    <p>
                        Son verificaciones basadas en métricas que se planifican para verificar el 
                        correcto funcionamiento de la solución en ambiente de producción. Se establece 
                        de antemano un periodo de tiempo prudencial que permitirá corregir errores 
                        (de darse) y finalizar con la aceptación a satisfacción del cliente.
                        <br>
                        <br>
                        El análisis general, permite determinar que la propuesta de la metodología 
                        EDER, proporciona procesos claros y pertinentes en la aplicación de proyectos 
                        de infraestructura tecnológica, siendo en los procesos “estudio” y “revisión” 
                        un poco más exigente para la culminación exitosa de la propuesta. El alto 
                        porcentaje obtenido en la etapa de ejecución, muestra que la mayoría de 
                        propuestas enfoca o centran su realización en el desarrollo del trabajo, 
                        EDER como alternativa, determina la importancia en establecer de manera clara 
                        el estudio de la investigación, antes de su ejecución que, de acuerdo a los 
                        autores, propende al aseguramiento del éxito de todo proyecto de investigación 
                        tecnológica.
                    </p>      
                </div> -->

            </div>
            <div class="footer-entry clearfix">
                <div class="single-tags pull-left">
                    <i class="fa fa-tags"></i>
                    <a href="#">Nuestras Redes Sociales</a>
                </div>
                <div class="social-share pull-right">
                    <a href="#" ><i class="fa fa-facebook"></i></a>
                    <a href="#" ><i class="fa fa-twitter"></i></a>
                    <a href="#" ><i class="fa fa-google-plus"></i></a>
                    <a href="#" ><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
            <nav class="navigation post-navigation">                                        
                <div class="nav-links">
                    <div class="nav-previous">
                        <a href="#">
                            <span class="meta-nav"><i class="fa fa-angle-double-left"></i> Anterior</span> 
                        </a>
                    </div>
                    <div class="nav-next">
                        <a href="#">
                            <span class="meta-nav">Siguiente <i class="fa fa-angle-double-right"></i></span>
                        </a>
                    </div>

                </div>
            </nav>
            <br>
            <hr>
        </div>
    </article>
    <!-- post close -->
</div>