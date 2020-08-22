<section class="content-header">
    <h1><i class="fa fa-home"></i> <span><?php echo $glTitulo; ?>
        <?php if($establecimiento->id_establecimiento):?>
            N° Folio <?php echo $establecimiento->gl_folio; ?>
        <?php endif;?></span></h1>
</section>

<section class="content pb-3">
    <div class="container-fluid">
        <form id="form" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="card card-custom">
                <div class="card-body">
                    <input hidden type="text" name="cambio_direccion"      id="cambio_direccion"      value="0" />
                    <input hidden type="text" name="token_establecimiento" id="token_establecimiento" value="<?php echo $establecimiento->gl_token; ?>" />
                    <input hidden type="text" name="bo_editar"             id="bo_editar"             value="<?php echo $bo_editar; ?>" />
                    <input hidden type="text" name="bo_validado"           id="bo_validado"           value="<?php echo $bo_validado; ?>" />
                    
                    <div class="card card-custom">
                        <div class="card-header card-header-custom box box-primary">
                            <h3 class="card-title text-primary"><i class="fas fa-edit"></i> <?php echo \Traduce::texto("Identificación De establecimiento"); ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="required-left col-sm-6 col-form-label" for="id_tipo_establecimiento"><?php echo \Traduce::texto("Tipo Establecimiento"); ?></label>
                                    <div class="col-sm-6">
                                        <select class="form-control form-control-sm" id="id_tipo_establecimiento" name="id_tipo_establecimiento"
                                            onchange="Establecimiento.cambiarTipoEstablecimiento(this)">
                                            <option value="0"><?php echo \Traduce::texto("Seleccione"); ?></option>
                                            <?php foreach($arrEstablecimientoTipo as $item):?>
                                            <option value="<?php echo $item->id; ?>" <?php if($item->id == $establecimiento->id_tipo_establecimiento):?> selected <?php endif; ?> >
                                                <?php echo $item->nombre; ?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="required-left col-sm-4 col-form-label" for="gl_nombre_legal"><?php echo \Traduce::texto("Nombre Legal"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="gl_nombre_legal" id="gl_nombre_legal" 
                                               placeholder="<?php echo \Traduce::texto("Nombre Legal"); ?>" required
                                               value="<?php echo $establecimiento->gl_nombre_legal; ?>"/>
                                    </div>
                                    <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                </div>
                                
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="gl_nombre"><?php echo \Traduce::texto("Nombre Fantasía"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="gl_nombre" id="gl_nombre" 
                                               placeholder="<?php echo \Traduce::texto("Nombre Fantasía"); ?>" 
                                               value="<?php echo $establecimiento->gl_nombre_establecimiento; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="tipo_propiedad"><?php echo \Traduce::texto("Propiedad"); ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="tipo_propiedad" name="tipo_propiedad">
                                            <option value="0"><?php echo \Traduce::texto("Seleccione"); ?></option>
                                            <?php foreach($arrPropiedad as $item):?>
                                            <option value="<?php echo $item->id; ?>" <?php if($item->id == $establecimiento->id_establecimiento_propiedad):?> selected <?php endif; ?> >
                                                <?php echo $item->nombre; ?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="gl_email"><?php echo \Traduce::texto("Email"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control form-control-sm" name="gl_email" id="gl_email" 
                                               onblur="Base.validarEmail(this)" placeholder="<?php echo \Traduce::texto("Email"); ?>"
                                               value="<?php echo $establecimiento->gl_email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="gl_telefono"><?php echo \Traduce::texto("Teléfono"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="gl_telefono" id="gl_telefono" maxlength="8" 
                                               onblur="Establecimiento.cambiarTelefono()"
                                               onKeyPress="return soloNumeros(event)" placeholder="<?php echo \Traduce::texto("Teléfono"); ?>" 
                                               value="<?php echo $establecimiento->gl_telefono; ?>"/>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>



                    <div class="callout callout-warning py-0" style="display: none;" id="div_datos_adicionales_establecimiento">
                        <div class="card card-custom">
                            <div class="card-header card-header-custom">
                                <h3 class="card-title text-primary"><i class="fas fa-search-plus"></i></i> <?php echo \Traduce::texto("Datos Adicionales"); ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                              </div>
                           </div>
                            <div class="card-body">
                                <div class="row datos_adicionales" id="div_contenedor_campos_adicionales"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom">
                        <div class="card-header card-header-custom box box-primary">
                            <h3 class="card-title text-primary"><i class="fas fa-map-marked-alt"></i> <?php echo \Traduce::texto("Lugar geográfico"); ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="required-left col-sm-4 col-form-label" for="id_pais"><?php echo \Traduce::texto("Pais"); ?></label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm" id="id_pais" name="id_pais" 
                                                        onchange="Territorio.cargarDireccionEstadosByPais(this.value, 'id_direccion_estado'<?php echo (!empty($territorialidadUsuario["id_territorialidad_estatal"]))?', '.$territorialidadUsuario["id_territorialidad_estatal"]:'';?>)"
                                                        required <?php if(!is_array($arrPaises) || !$territorialidadUsuario["bo_territorialidad_ops"]){echo 'disabled';}?> >
                                                    <option value="0"><?php echo \Traduce::texto("Seleccione"); ?></option>
                                                    <?php foreach($arrPaises as $item):?>
                                                        <option value="<?php echo $item->id; ?>"
                                                            <?php if($item->id == $establecimiento->id_pais || $item->id == $territorialidadUsuario["id_territorialidad_pais"]):?>
                                                                selected
                                                            <?php endif;?> 
                                                            data-extras='{"iso2":"<?php echo $item->iso2; ?>", "gl_latitud":"<?php echo $item->gl_latitud; ?>", "gl_longitud":"<?php echo $item->gl_longitud; ?>"}'>
                                                            <?php echo $item->nombre; ?>
                                                        </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="required-left col-sm-4 col-form-label" for="id_direccion_estado"><?php echo \Traduce::texto("Estado"); ?></label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm" id="id_direccion_estado" name="id_direccion_estado" 
                                                onchange="Territorio.cargarDireccionCiudadesByEstado(this.value, 'id_direccion_ciudad'<?php echo (!empty($territorialidadUsuario["id_territorialidad_ciudad"]))?', '.$territorialidadUsuario["id_territorialidad_ciudad"]:'';?>)"
                                                        required <?php if(!$territorialidadUsuario["bo_territorialidad_nacional"] && !$territorialidadUsuario["bo_territorialidad_ops"]){echo 'disabled';}?> >
                                                    <option value="0"><?php echo \Traduce::texto("Seleccione"); ?></option>
                                                    <?php foreach($arrDireccionEstados as $item):?>
                                                        <option value="<?php echo $item->id; ?>"
                                                            <?php if($item->id == $establecimiento->id_direccion_estado || $item->id == $territorialidadUsuario["id_territorialidad_estatal"]):?>
                                                                selected
                                                            <?php endif;?> 
                                                            data-extras='{"iso2":"<?php echo $item->iso2_pais; ?>", "gl_latitud":"<?php echo $item->gl_latitud; ?>", "gl_longitud":"<?php echo $item->gl_longitud; ?>"}'>
                                                            <?php echo $item->nombre; ?>
                                                        </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="required-left col-sm-4 col-form-label" for="id_direccion_ciudad"><?php echo \Traduce::texto("Ciudad"); ?></label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm" id="id_direccion_ciudad" name="id_direccion_ciudad" 
                                                        required <?php if(!$territorialidadUsuario["bo_territorialidad_estatal"] && !$territorialidadUsuario["bo_territorialidad_nacional"] && !$territorialidadUsuario["bo_territorialidad_ops"]){echo 'disabled';}?> >
                                                    <option value="0"><?php echo \Traduce::texto("Seleccione"); ?></option>
                                                    <?php foreach($arrDireccionCiudad as $item):?>
                                                        <option value="<?php echo $item->id; ?>"
                                                            <?php if($item->id == $establecimiento->id_direccion_ciudad || $item->id == $territorialidadUsuario["id_territorialidad_ciudad"]):?>
                                                                selected
                                                            <?php endif;?> 
                                                            data-extras='{"iso2":"<?php echo $item->iso2_pais; ?>", "gl_latitud":"<?php echo $item->gl_latitud; ?>", "gl_longitud":"<?php echo $item->gl_longitud; ?>"}'>
                                                            <?php echo $item->nombre; ?>
                                                        </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="col-sm-4 col-form-label" for="direccion"><?php echo \Traduce::texto("Dirección"); ?></label>
                                            <div class="col-sm-8 input-group">
                                                <!--class="form-control form-control-sm mr-3"-->
                                                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                        placeholder="<?php echo \Traduce::texto("Dirección"); ?>"
                                                        value="<?php echo $establecimiento->gl_direccion; ?>" />
                                                <input type="hidden" id="direccion_hidden" value="" />
                                                <!--button type="button"
                                                        onclick="Establecimiento.buscarDireccion()"
                                                        data-toggle="tooltip"
                                                        data-title="Buscar Dirección"
                                                        class="form-control-sm btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-search"></i>
                                                </button-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="col-sm-4 col-form-label" for="gl_datos_referencia"><?php echo \Traduce::texto("Datos de Referencia"); ?></label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control form-control-sm" 
                                                    name="gl_datos_referencia" id="gl_datos_referencia" rows="4"
                                                ><?php echo $establecimiento->gl_referencia ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group row col-md-12">
                                            <label class="col-sm-4 col-form-label" for="gl_observaciones"><?php echo \Traduce::texto("Observaciones"); ?></label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control form-control-sm" 
                                                          id="gl_observaciones" name="gl_observaciones"  rows="4"
                                                 ><?php echo $establecimiento->gl_observaciones ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div id="map" data-editable="1" style="width:100%;height:310px;"></div>
                                    </div>

                                    <div class="form-row">
                                        <!--    LATITUD    -->
                                        <div class="form-group row col-md-6">
                                            <label class="col-sm-5 col-form-label" for="gl_latitud"><i class="fas fa-map-marker-alt text-green"></i> <?php echo \Traduce::texto("Latitud"); ?></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="gl_latitud" name="gl_latitud" value="<?php echo $establecimiento->gl_latitud; ?>" readonly/>
                                            </div>
                                        </div>
                                        <!--    LONGITUD    -->
                                        <div class="form-group row col-md-6">
                                            <label class="col-sm-5 col-form-label" for="gl_longitud"><i class="fas fa-map-marker-alt text-green"></i> <?php echo \Traduce::texto("Longitud"); ?></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="gl_longitud" name="gl_longitud" value="<?php echo $establecimiento->gl_longitud; ?>" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php /*

                    <div class="card card-custom">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title text-primary"><i class="fas fa-id-card"></i> <?php echo \Traduce::texto("Encargado Establecimiento"); ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="required-left col-sm-4 col-form-label" for="gl_nombres_encargado"><?php echo \Traduce::texto("Nombres"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm no-editable" required name="gl_nombres_encargado" id="gl_nombres_encargado" 
                                                 placeholder="<?php echo \Traduce::texto("Primer Nombre"); ?> - <?php echo \Traduce::texto("Segundo Nombre"); ?>"
                                                 value="<?php echo $encargado->gl_nombres; ?>" />
                                    </div>
                                    <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label class="required-left col-sm-4 col-form-label" for="gl_apellidos_encargado">Apellidos</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm no-editable" required name="gl_apellidos_encargado" id="gl_apellidos_encargado" 
                                               placeholder="<?php echo \Traduce::texto("Primer Apellido"); ?> - <?php echo \Traduce::texto("Segundo Apellido"); ?>"
                                               value="<?php echo $encargado->gl_apellidos; ?>" />
                                    </div>
                                    <div class="invalid-feedback"><?php echo \Traduce::texto("Este campo es obligatorio"); ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="id_codigo_fono_encargado"><?php echo \Traduce::texto("Teléfono"); ?></label>
                                    <div class="col-sm-8">
                                        <input type='text' class="form-control form-control-sm" id='gl_telefono_encargado' name='gl_telefono_encargado' 
                                                placeholder="99 999 9999" maxlength="10" onKeyPress="return soloNumeros(event)" onblur="Establecimiento.cambiarTelefono()"
                                                value="<?php echo $encargado->gl_fono; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label class="col-sm-4 col-form-label" for="gl_email_encargado"><?php echo \Traduce::texto("Email"); ?></label>
                                    <div class="col-sm-8">
                                        <input type='email' class="form-control form-control-sm" id='gl_email_encargado' name='gl_email_encargado' 
                                                placeholder="<?php echo \Traduce::texto("Email"); ?>" onblur="validaEmail(this, '<?php echo \Traduce::texto("Correo Inválido"); ?>!')"
                                                value="<?php echo $encargado->gl_email; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card card-custom">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title text-primary"><i class="fas fa-clipboard-check"></i> <?php echo \Traduce::texto("Clasificaciones Establecimiento"); ?></h3>
                            <div class="card-tools">
                                <button type="button"
                                        onclick="Establecimiento.agregarClasificacion();"
                                        data-toggle="tooltip"
                                        data-title="Agregar Autorización"
                                        class="btn btn-sm btn-success">
                                    <i class="fa fa-plus-circle"></i> <?php echo \Traduce::texto("Agregar"); ?>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group" id="div_nueva_autorizacion" style="display: none">
                                
                            </div>
                            <div class="form-group" id="div_grilla_autorizacion">
                                <?php echo $grilla_autorizacion;?>
                            </div>
                        </div>
                    </div>
                    */?>

                    <hr/>
                    <div class="card-footer">
                        <div class="d-flex justify-content-around">
                            <button type="button" class="btn btn-success btn-lg" id="guardar" onclick="javascript:$(this).attr('disabled', 'disabled'); Establecimiento.guardar(this);" >
                                <i class="fa fa-save"></i>  <?php echo \Traduce::texto("Guardar"); ?>
                            </button>
                            <a type="button" class="btn btn-default btn-lg" id="cancelar"
                                href="<?php echo \Pan\Uri\Uri::getBaseUri(); ?>Establecimiento/Home/Bandeja/index">
                                <i class="fa fa-remove"></i>  <?php echo \Traduce::texto("Cancelar"); ?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <hr/>
        </form>
    </div>
</section>

