<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            $this->view('news/sidebar_nav');
            ?>
        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $err_message; ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Publish News</strong>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('news/edit_news/'.$newsid, $attributes);
                    ?>
                    <script type="text/javascript" src="<?php echo base_url("assets/js/tinymce/tinymce.min.js"); ?>"></script>
                    <script type="text/javascript">
                    tinyMCE.init({
                        // General options
                        mode : "textareas",
                        height: 800,
                        theme : "modern",
                        plugins : "spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template",

                        // Theme options
                        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true
                    });
                    </script>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input id="news" type="text" name="news"  value="<?php echo $details->name ?>" type="text" class="form-control" id="event_type" placeholder="News Title">
                            <?php echo form_error('news'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea type="text" name="description" type="text" class="form-control" id="description" placeholder=""><?php echo $details->description ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Publish">
                            <button type="reset" class="btn btn-raised  btn-default">Reset</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</div>
