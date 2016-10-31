@extends('admin.layouts.base-1cols')

@section('title')
Admin area: Edit user profile
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        {{-- success message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{!! $message !!}</div>
        @endif
        <div class="comMsg"></div>

        <div class="panel panel-info margin-top-10">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title bariol-bold"><i class="fa fa-user"></i> Company Profile</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-9">                        
                        {!! Form::model($user_profile,['route'=>'users.company_profile.edit', 'method' => 'post', 'files' => true, 'id'=>'companyProfile']) !!}
                        <?php $infos = (isset($user_profile->company_info) && !empty($user_profile->company_info)) ? $user_profile->company_info : ""; ?>
                        <ul class="nav nav-tabs">
                            <?php
                            $count=1;
                            if (isset($infos) && !empty($infos)):
                                $infos = json_decode($infos, TRUE);
                                $default = isset($infos['max_row'])?$infos['max_row']: count($infos);
                                $default = $infos['Default'];
                                $count = isset($infos['max_row'])?$infos['max_row']: count($infos);;
                                unset($infos['Default']);
                                unset($infos['max_row']);
                                $j = 1;
                                foreach ($infos as $info) : ?>
                                    <li class="<?php if ($j == 1): echo "active"; endif; ?>"><a href="#contact_<?php echo $j; ?>" data-toggle="tab"><?php echo $info['company_name']; ?></a><span>x</span></li>
                                    <?php
                                $j++;
                                endforeach;
                            else:
                                ?>
                                <li class="active"><a href="#contact_1" data-toggle="tab">Profile 1</a><span>x</span></li>
                            <?php endif; ?>
                        </ul>
                        <ul>
                            <li><a href="javascript:void(0)" class="add-contact">+ Add Contact</a></li>
                            <input type='hidden' name="max_row" value="<?php echo $count; ?>" id="tab-length">
                        </ul>
                            <div class="tab-content">
                                <?php
                                if (isset($infos) && !empty($infos)):
                                    $count = count($infos);
                                    $i = 1;
                                foreach ($infos as $k=> $info) : ?>
                                    <div class="tab-pane <?php if ($i == 1): echo "active"; endif; ?>" id="contact_<?php echo $i; ?>">
                                        <div class="form-group">
                                            <label for="company_name">Company Name: </label>
                                            <input id="company_name" class="form-control company_name" placeholder="" name="company_name[<?php echo $i; ?>]" value="<?php echo $info['company_name']; ?>" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="Your URL's">Your URL's: </label>
                                            <input id="urls" class="form-control urls" placeholder="" name="urls[<?php echo $i; ?>]" type="text" value="<?php echo $info['urls']; ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="phone">Phone: </label>
                                            <input id="c_phone" class="form-control c_phone" placeholder="" name="c_phone[<?php echo $i; ?>]" type="text" value="<?php echo isset($info['phone'])?$info['phone']:""; ?>">
                                        </div>

                                        <div class="form-group">
                                            <?php 
                                            if(isset($info['logo']) && !empty($info['logo'])): 
                                                $logo = $info['logo']; ?>
                                                <input name="old_logos[<?php echo $i; ?>]" type="hidden" value="<?php echo $info['logo']; ?>">
                                                <img type="file" data-name="{{$logo}}" width="70" src="{{Config::get('app.url')}}/logos/{{$logo}}">
                                            <?php endif; ?>
                                            <label for="Logo(s)">Logo(s): </label>
                                            <input name="logos[<?php echo $i; ?>]" type="file">
                                        </div>

                                        <div class="form-group">
                                            <?php $l=1; foreach($info['copay_statement'] as $key => $d): ?>
                                                <p row="<?php echo $i; ?>" count='<?php echo $key; ?>'>
                                                    <label for="Copay statement">Copay statement: </label>
                                                    <input id="copay_statement" class="form-control copay_statement" placeholder="" name="copay_statement[<?php echo $i; ?>][<?php echo $key; ?>]" type="text" value="<?php echo $d; ?>">
                                                    <?php if($l>1):?>
                                                        <a href="javascript:void(0)" class="glyphicon glyphicon-minus-sign remove"></a>
                                                    <?php endif; ?>
                                                </p>
                                            <?php $l++; endforeach; ?>
                                            <a href="javascript:void(0)" class="addMore">Add More</a>
                                        </div>

                                        <div class="form-group">
                                            <label for="Moniker's">Moniker's: </label>
                                            <input id="monikers" class="form-control monikers" placeholder="" name="monikers[<?php echo $i; ?>]" type="text" value="<?php echo $info['monikers']; ?>">
                                        </div>
                                        <?php if($k==$default) : ?>
                                            <div class="form-group">
                                                <input id="default" class="form-control default" placeholder="" name="Default" type="radio" value="<?php echo $default; ?>" checked="checked">
                                                <span>Make This Tab default </span>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <input id="default" class="form-control default" placeholder="" name="Default" type="radio" value="Company<?php echo $i; ?>">
                                                <span>Make This Tab default </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php 
                                    $i++;
                                endforeach; 
                                else: ?>
                                <div class="tab-pane active" id="contact_1">
                                    <div class="form-group">
                                        <label for="company_name">Company Name: </label>
                                        <input id="company_name" class="form-control company_name" placeholder="" name="company_name[1]" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Your URL's">Your URL's: </label>
                                        <input id="urls" class="form-control urls" placeholder="" name="urls[1]" type="text">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Phone: </label>
                                        <input id="c_phone" class="form-control c_phone" placeholder="" name="c_phone[1]" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="Logo(s)">Logo(s): </label>
                                        <input name="logos[1]" type="file">
                                    </div>

                                    <div class="form-group">
                                        <p row="1" count='1'>
                                            <label for="Copay statement">Copay statement: </label>
                                            <input id="copay_statement" class="form-control copay_statement" placeholder="" name="copay_statement[1][1]" type="text">
                                        </p>
                                        <a href="javascript:void(0)" class="addMore">Add More</a>
                                    </div>

                                    <div class="form-group">
                                        <label for="Moniker's">Moniker's: </label>
                                        <input id="monikers" class="form-control monikers" placeholder="" name="monikers[1]" type="text">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input id="default" class="form-control default" placeholder="" name="Default" type="radio" value="Company1" checked="checked">
                                        <span>Make This Tab default </span>
                                    </div>
                                    
                                </div>
                                <?php endif; ?>
                            </div>
                        {!! Form::hidden('user_id', $user_profile->user_id) !!}
                        {!! Form::hidden('id', $user_profile->id) !!}
                        {!! Form::hidden('type', 'profile') !!}
                        {!! Form::hidden('modal', $modal) !!}
                        {!! Form::hidden('page', 'profile', ['id'=>'profile','disabled'=> 'disabled']) !!}
                        {!! Form::hidden('page', 'letusdo', ['id'=>'let-us-do','disabled'=> 'disabled']) !!}
                        {!! Form::button('Update',['class' =>'btn btn-info margin-bottom-30 company-profile']) !!}
                        {!! Form::button('Update & Launch MARCOM Builder',['class' =>'btn btn-info margin-bottom-30 update-launch']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="letusdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            </div>
            <div class="modal-body">
                <p class="tt">Let us do it for you!</p>
                <p>We can prepare the entire co-branded flyer, poster, email or social graphic for you with easy!</p>
                <p class="tt"><b>We will need the following things for you:</b></p>
                <p>#1 - you need to fill out profile for our company.<br>including:</p>
                <ul>
                    <li>Company name (including LLC, Inc. ESQ, Etc.It will be printed exactly as you enter it.).</li>
                    <li>Website Address.</li>
                    <li>High resolution logo (files should be minimum of 100px wide, file type includes jpg, eps, pdf).</li>
                    <li>Phone Number.</li>
                </ul>
                <button style="margin: 0 auto;display: block;" data-dismiss="modal" aria-label="Close" class="btn btn-info" type="button">Continue</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script type="text/javascript">

    var _modal = "<?php echo $modal; ?>";
    if(_modal && _modal=="yes"){
       $('#letusdo').modal('show'); 
    }
</script>
{!! HTML::script('packages/barryvdh/elfinder/js/standalonepopup.js') !!}
@stop
