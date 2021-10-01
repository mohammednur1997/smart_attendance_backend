@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Language</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("language")}}>Language Setting</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Language Setting</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <!------CONTROL TABS START------->
                    <ul class="nav nav-tabs" role="tablist">

                        <?php if(isset($edit_profile)):?>
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#edit" role="tab"><span class="hidden-sm-up"><i class="icon-settings"></i></span> <span class="hidden-xs-down"><?php echo translate('edit_phrase');?></span></a> </li>
                        <?php endif;?>


                        <li class="nav-item"> <a class="nav-link <?php if(!isset($edit_profile))echo 'active';?>" data-toggle="tab" href="#list" role="tab"><span class="hidden-sm-up"><i class="icon-list"></i></span> <span class="hidden-xs-down"><?php echo translate('phrase_list');?></span></a> </li>


                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#add" role="tab"><span class="hidden-sm-up"><i class="icon-plus"></i></span> <span class="hidden-xs-down"><?php echo translate('add_phrase');?></span></a> </li>


                        <!---- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#add_lang" role="tab"><span class="hidden-sm-up"><i class="icon-plus"></i></span> <span class="hidden-xs-down"><?php echo translate('add_language');?></span></a> </li> -->

                    </ul>

                    <div class="tab-content tabcontent-border">
                        <!----PHRASE EDITING TAB STARTS-->
                        <?php if (isset($edit_profile)):?>
                        <div class="tab-pane active" id="edit" style="padding: 5px">

                            <form class="needs-validation" role="form" action="{{route('language.update', $edit_profile)}}" method="post" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <?php
                                $current_editing_language = $edit_profile;
                                ?>


                                <?php
                                $count = 1;
                                $language_phrases = App\Model\LanguageWord::all();

                                foreach($language_phrases as  $row)
                                {
                                $phrase_id			=	$row->id;					//id number of phrase
                                $phrase				=	$row->word;						//basic phrase text
                                $phrase_language	=	$row[$current_editing_language];	//phrase of current editing language
                                ?>
                                <!----phrase box starts-->


                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo $count++;?>. <?php echo $row->word ?></h4>

                                                <div class="form-group">

                                                    <input type="hidden" name="wid[]" value="<?php echo $row->id ?>" />

                                                    <input type="hidden" class="form-control" name="word[]" value="<?php echo $phrase_language;?>" style="margin-top:10px;width:100%;" />

                                                    <input type="text" class="form-control" name="phrase[]" value="<?php echo $phrase_language;?>" style="margin-top:10px;width:100%;" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!----phrase box ends-->
                                    <?php
                                    }
                                    ?>
                                </div>

                                <input type="hidden" name="total_phrase" value="<?php echo $count;?>" />
                                <input type="submit" class=" btn btn-primary btn-block" value="<?php echo translate('update_phrase');?>" class="btn btn-blue"/>
                            </form>
                        </div>
                    <?php endif;?>
                    <!----PHRASE EDITING TAB ENDS-->

                        <!----TABLE LISTING STARTS--->
                        <div class="tab-pane box span7 <?php if(!isset($edit_profile))echo 'active';?>" id="list">


                            <table cellpadding="0" cellspacing="0" border="0" class="table table-normal">
                                <thead>
                                <tr>
                                    <th><?php echo translate('language');?></th>
                                    <th><?php echo translate('option');?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //$fields = $this->db->list_fields('language');
                                $fields = App\Model\Language::where('db_status','Live')->get();
                                foreach($fields as $field)
                                {
                                if($field == 'id' || $field == 'word')continue;
                                ?>
                                <tr>
                                    <td><?php echo ucwords($field->name);?></td>
                                    <td>
                                        <a href="{{ route('language.edit',$field->name )}}"
                                           class="btn btn-info">
                                            <i class="icon-wrench"></i>
                                            <?php echo translate('edit_phrase');?>
                                        </a>
                                        <a id="delete" href="{{ route('language.delete',$field->name) }}" class="btn btn-danger">
                                            <i class="icon-trash"></i>
                                            <?php echo translate('delete_language');?>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!----TABLE LISTING ENDS--->


                        <!----PHRASE CREATION FORM STARTS---->
                        <div class="tab-pane box" id="add" style="padding: 5px">
                            <div class="box-content">
                                <form action="{{route('add.phrase')}}" method="post">
                                    @csrf
                                    <div class="padded">
                                        <div class="control-group">
                                            <label class="control-label"><?php echo translate('phrase');?></label>
                                            <div class="controls">
                                                <input type="text" class="form-control" class="validate[required]" name="phrase"/>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-blue"><?php echo translate('add_phrase');?></button>
                                    </div>
                                   </form>
                            </div>
                        </div>
                        <!----PHRASE CREATION FORM ENDS--->

                        <!----ADD NEW LANGUAGE
                        <div class="tab-pane box" id="add_lang" style="padding: 5px">
                            <div class="box-content">
                                    <form method="" action="">
                                <div class="padded">
                                    <div class="control-group">
                                        <label class="control-label"><?php echo translate('language');?></label>
                                        <div class="controls">
                                            <input type="text" class="form-control" class="validate[required]" name="language"/>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-blue"><?php echo translate('add_language');?></button>
                                </div>
                                    </form>
                            </div>
                        </div>
                       LANGUAGE ADDING FORM ENDS--->

                    </div>
                </div>
            </div>

        </div>
@endsection
