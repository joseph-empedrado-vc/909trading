<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">Profile</div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <img src="<?=_assets_url;?>images/user_profile_blank.png" />
                    </div>
                    <div class="media-body">
                        <?php $full_name = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');  ?>
                        <h4 class="media-heading page-sub-title"><?=$full_name;?></h4>
                        <span><?=$this->session->userdata('occupation');?></span>
                        <br/>
                        <span><?=$this->session->userdata('email');?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--

array (size=25)
  '__ci_last_regenerate' => int 1428053286
  'user_id' => string '1' (length=1)
  'first_name' => string 'Joseph' (length=6)
  'last_name' => string 'Empedrado' (length=9)
  'facebook_connect_user_id' => string '0' (length=1)
  'group_id' => string '9' (length=1)
  'username' => string 'admin' (length=5)
  'screen_name' => string 'Administrator' (length=13)
  'password' => string 'WKtr0FI96DbafnSD7Ji+lO2hJgUEd2Ni0A7DDdpQEoYlx924HtqKCsMn41UukQVLzPb1fLh79JalpTpkS73MIw==' (length=88)
  'email' => string 'info@909trading.com' (length=19)
  'url' => string '909trading.com/index.php/admin' (length=30)
  'location' => null
  'occupation' => string 'Administrator' (length=13)
  'interests' => string 'Basketball' (length=10)
  'bday_d' => string '22' (length=2)
  'bday_m' => string '7' (length=1)
  'bday_y' => string '1983' (length=4)
  'photo_filename' => null
  'photo_width' => null
  'photo_height' => null
  'join_date' => string '0' (length=1)
  'last_visit' => string '0' (length=1)
  'last_activity' => string '0' (length=1)
  'signed_in' => boolean true
  'random_number' => string 'ufdfm' (length=5)

-->