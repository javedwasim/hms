<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
$success = $this->input->get("success");
if ($success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Information has been saved successfully!</div>';
}
?>
<html>
<head>
    <title>Admit New Patient | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
    <?php echo '<input type="hidden" id="base" value="' . $base_url . '">'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('main_header'); ?>
        <!-- Left side column. contains the logo and sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    New Admission
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?php echo base_url('/dashboard/new_admission/'); ?>"> New Admission</a></li>
                </ol>
                <br>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Admission Statistics</span>
                                <span class="info-box-number"><span style="font-size: 20px"><?php $patcount = $this->model_hms->patient_counter(); if(!empty($patcount)){ echo $patcount->counter; } ?></span> Patient(s) / <span
                                style="font-size: 20px"><?php $bedcount = $this->model_hms->bed_counter(); if(!empty($bedcount)){ echo $bedcount->counter; } ?></span> Bed(s)</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </section>

            <!-- Main content -->

            <section class="content">
                <form action="<?php echo base_url('dashboard/insert_user_db'); ?>" class="submit-form" method="post" enctype="multipart/form-data">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Patient Personal Information</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>MR#</label>
                                            <input class="form-control"  type="text"
                                            name="RegNumber" id="regName" placeholder="MR#"
                                            value="<?php if (!empty($reg_num)) {
                                             foreach ($reg_num as $reg) {
                                                 echo $reg["regNo"] + 1;
                                             }
                                         } ?>" disabled>
                                     </div><!-- /.form-group -->
                                 </div><!-- /.col -->
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Emergency/OPD Number</label>
                                        <input tabindex=1 class="form-control" maxlength="12"  type="text" id="emNo" name="emNo" placeholder="Type Number" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" />
                                    </div><!-- /.form-group -->

                                </div><!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Admission Number</label>
                                        <input tabindex=2 class="form-control" maxlength="12"  type="text" id="admNo" name="admNo" placeholder="Type Number" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" />
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input tabindex=3 class="form-control" maxlength="15" type="text"
                                        id="patName" name="patName" placeholder="Type Name">
                                    </div><!-- /.form-group -->

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Next of Kin</label>
                                    <div class="form-group">
                                        <div class="col-md-4" style="padding: 0">
                                            <select  tabindex=4  class="form-control next-of-kin"
                                            style="width: 100%;" name="patNoKType" id="id1">
                                            <option></option>
                                            <option value="S/O">S/O</option>
                                            <option value="D/O">D/O</option>
                                            <option value="W/O">W/O</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8" style="padding: 0">
                                        <input tabindex=5  class="form-control" maxlength="15" required="required" type="text" id="guardianName" name="patNoKName" placeholder="Enter name" />
                                    </div>
                                </div><!-- /.form-group -->
                            </div><!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <br>
                                    <input type="radio"  name="sex" class="custom-radio"
                                    id="sex-male" value="Male" checked="checked"><label class="radio-labels"> Male</label>
                                    <input type="radio"  name="sex" class="custom-radio"
                                    id="sex-female" value="Female"><label class="radio-labels"> Female</label>
                                    <input type="radio"  name="sex" class="custom-radio"
                                    id="sex-other" value="Other"><label class="radio-labels"> Other</label>
                                </div><!-- /.form-group -->
                            </div><!-- /.col -->

                            <div class="col-md-2">
                                <div class="form-group">

                                    <label>Age in years</label>
                                    <input tabindex=6 class="form-control" maxlength="3"  type="text" name="patAge" id="patAge" placeholder="Years">
<!--                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input tabindex=6 type="text" class="form-control" id="datepicker" name="patDoB" placeholder="e.g. DD-MM-YYYY">
                                    </div>-->
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Months</label>
                                    <input tabindex=7  class="form-control" maxlength="2"  type="text" name="patAgemonth"  placeholder="months">
                                </div>
                            </div><!-- /.col -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Days</label>
                                    <input tabindex=8  class="form-control" maxlength="2" type="text" name="patAgedays"  placeholder="Days">
                                </div>
                            </div><!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Select Blood Group</label>
                                <div class="form-group">
                                    <select class="form-control bld-grp" style="width: 100%;"
                                    tabindex="9" name="patBldGrp" id="id9">
                                    <option></option>
                                    <option value="A+VE">A+VE</option>
                                    <option value="A-VE">A-VE</option>
                                    <option value="B+VE">B+VE</option>
                                    <option value="B-VE">B-VE</option>
                                    <option value="AB+VE">AB+VE</option>
                                    <option value="AB-VE">AB-VE</option>
                                    <option value="O+VE">O+VE</option>
                                    <option value="O-VE">O-VE</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-9" style="padding: 0">
                                    <label>Disease</label>
                                    <select tabindex=10  class="form-control disease" style="width: 100%;" name="patDisease" id="id10">
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 25px;padding: 0">
                                    <a href="<?php echo base_url('/dashboard/insert_diseases'); ?>" class="btn btn-default btn-sm" style="font-size: 10px;padding: 8px 10px;">Add disease</a>
                                </div>
                                
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3">
                            <label>Occupation</label>
                            <input tabindex=11 class="form-control" maxlength="15"  type="text" id="occupation" name="patOccupation" placeholder="Type Occupation">
                        </div><!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CNIC</label>
                                <input tabindex=12 class="form-control" maxlength="15"  type="text" name="patCnic" id="cnic"  placeholder="Type CNIC number" maxlength="15"autocomplete="off" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" />
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                    <div class="row">
                     
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address</label>
                                <input tabindex=13 type="text" class="form-control" maxlength="30"  id="address" name="patAddress" placeholder="Type Address" />
                            </div><!-- /.form-group -->                                
                        </div><!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control patcity" name="patCity" id="id14" tabindex=14 />
                                <option></option>
                                <option value="Abbottabad"> Abbottabad </option>
                                <option  value="Adezai">Adezai</option>
                                <option value="Ali Bandar">Ali Bandar</option>
                                <option value="Amir Chah">Amir Chah</option>
                                <option  value="Attock">Attock</option>
                                <option  value="Ayubia">Ayubia</option>
                                <option  value="Bahawalpur">Bahawalpur</option>
                                <option  value="Baden">Baden</option>
                                <option  value="Bagh">Bagh</option>
                                <option  value="Bahawalnagar">Bahawalnagar</option>
                                <option  value="Burewala">Burewala</option>
                                <option class="option" value="Banda Daud Shah">Banda Daud Shah</option>
                                <option class="option" value="Bannu district|Bannu">Bannu</option>
                                <option class="option" value="Batagram">Batagram</option>
                                <option class="option" value="Bazdar">Bazdar</option>
                                <option class="option" value="Bela">Bela</option>
                                <option class="option" value="Bellpat">Bellpat</option>
                                <option class="option" value="Bhag">Bhag</option>
                                <option class="option" value="Bhakkar">Bhakkar</option>
                                <option class="option" value="Bhalwal">Bhalwal</option>
                                <option class="option" value="Bhimber">Bhimber</option>
                                <option class="option" value="Birote">Birote</option>
                                <option class="option" value="Buner">Buner</option>
                                <option class="option" value="Burj">Burj</option>
                                <option class="option" value="Chiniot">Chiniot</option>
                                <option class="option" value="Chachro">Chachro</option>
                                <option class="option" value="Chagai">Chagai</option>
                                <option class="option" value="Chah Sandan">Chah Sandan</option>
                                <option class="option" value="Chailianwala">Chailianwala</option>
                                <option class="option" value="Chakdara">Chakdara</option>
                                <option class="option" value="Chakku">Chakku</option>
                                <option class="option" value="Chakwal">Chakwal</option>
                                <option class="option" value="Chaman">Chaman</option>
                                <option class="option" value="Charsadda">Charsadda</option>
                                <option class="option" value="Chhatr">Chhatr</option>
                                <option class="option" value="Chichawatni">Chichawatni</option>
                                <option class="option" value="Chitral">Chitral</option>
                                <option class="option" value="Dadu">Dadu</option>
                                <option class="option" value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                <option class="option" value="Dera Ismail Khan">Dera Ismail Khan</option>
                                <option class="option" value="Dalbandin">Dalbandin</option>
                                <option class="option" value="Dargai">Dargai</option>
                                <option class="option" value="Darya Khan">Darya Khan</option>
                                <option class="option" value="Daska">Daska</option>
                                <option class="option" value="Dera Bugti">Dera Bugti</option>
                                <option class="option" value="Dhana Sar">Dhana Sar</option>
                                <option class="option" value="Digri">Digri</option>
                                <option class="option" value="Dina City|Dina">Dina</option>
                                <option class="option" value="Dinga">Dinga</option>
                                <option class="option" value="Diplo, Pakistan|Diplo">Diplo</option>
                                <option class="option" value="Diwana">Diwana</option>
                                <option class="option" value="Dokri">Dokri</option>
                                <option class="option" value="Drosh">Drosh</option>
                                <option class="option" value="Duki">Duki</option>
                                <option class="option" value="Dushi">Dushi</option>
                                <option class="option" value="Duzab">Duzab</option>
                                <option class="option" value="Faisalabad">Faisalabad</option>
                                <option class="option" value="Fateh Jang">Fateh Jang</option>
                                <option class="option" value="Ghotki">Ghotki</option>
                                <option class="option" value="Gwadar">Gwadar</option>
                                <option class="option" value="Gujranwala">Gujranwala</option>
                                <option class="option" value="Gujrat">Gujrat</option>
                                <option class="option" value="Gadra">Gadra</option>
                                <option class="option" value="Gajar">Gajar</option>
                                <option class="option" value="Gandava">Gandava</option>
                                <option class="option" value="Garhi Khairo">Garhi Khairo</option>
                                <option class="option" value="Garruck">Garruck</option>
                                <option class="option" value="Ghakhar Mandi">Ghakhar Mandi</option>
                                <option class="option" value="Ghanian">Ghanian</option>
                                <option class="option" value="Ghauspur">Ghauspur</option>
                                <option class="option" value="Ghazluna">Ghazluna</option>
                                <option class="option" value="Girdan">Girdan</option>
                                <option class="option" value="Gulistan">Gulistan</option>
                                <option class="option" value="Gwash">Gwash</option>
                                <option class="option" value="Hyderabad">Hyderabad</option>
                                <option class="option" value="Hala">Hala</option>
                                <option class="option" value="Haripur">Haripur</option>
                                <option class="option" value="Hab Chauki">Hab Chauki</option>
                                <option class="option" value="Hafizabad">Hafizabad</option>
                                <option class="option" value="Hameedabad">Hameedabad</option>
                                <option class="option" value="Hangu">Hangu</option>
                                <option class="option" value="Harnai">Harnai</option>
                                <option class="option" value="Hasilpur">Hasilpur</option>
                                <option class="option" value="Haveli Lakha">Haveli Lakha</option>
                                <option class="option" value="Hinglaj">Hinglaj</option>
                                <option class="option" value="Hoshab">Hoshab</option>
                                <option class="option" value="Islamabad">Islamabad</option>
                                <option class="option" value="Islamkot">Islamkot</option>
                                <option class="option" value="Ispikan">Ispikan</option>
                                <option class="option" value="Jacobabad">Jacobabad</option>
                                <option class="option" value="Jamshoro">Jamshoro</option>
                                <option class="option" value="Jhang">Jhang</option>
                                <option class="option" value="Jhelum">Jhelum</option>
                                <option class="option" value="Jamesabad">Jamesabad</option>
                                <option class="option" value="Jampur">Jampur</option>
                                <option class="option" value="Janghar">Janghar</option>
                                <option class="option" value="Jati, Jati(Mughalbhin)">Jati</option>
                                <option class="option" value="Jauharabad">Jauharabad</option>
                                <option class="option" value="Jhal">Jhal</option>
                                <option class="option" value="Jhal Jhao">Jhal Jhao</option>
                                <option class="option" value="Jhatpat">Jhatpat</option>
                                <option class="option" value="Jhudo">Jhudo</option>
                                <option class="option" value="Jiwani">Jiwani</option>
                                <option class="option" value="Jungshahi">Jungshahi</option>
                                <option class="option" value="Karachi">Karachi</option>
                                <option class="option" value="Kotri">Kotri</option>
                                <option class="option" value="Kalam">Kalam</option>
                                <option class="option" value="Kalandi">Kalandi</option>
                                <option class="option" value="Kalat">Kalat</option>
                                <option class="option" value="Kamalia">Kamalia</option>
                                <option class="option" value="Kamararod">Kamararod</option>
                                <option class="option" value="Kamber">Kamber</option>
                                <option class="option" value="Kamokey">Kamokey</option>
                                <option class="option" value="Kanak">Kanak</option>
                                <option class="option" value="Kandi">Kandi</option>
                                <option class="option" value="Kandiaro">Kandiaro</option>
                                <option class="option" value="Kanpur">Kanpur</option>
                                <option class="option" value="Kapip">Kapip</option>
                                <option class="option" value="Kappar">Kappar</option>
                                <option class="option" value="Karak City">Karak City</option>
                                <option class="option" value="Karodi">Karodi</option>
                                <option class="option" value="Kashmor">Kashmor</option>
                                <option class="option" value="Kasur">Kasur</option>
                                <option class="option" value="Katuri">Katuri</option>
                                <option class="option" value="Keti Bandar">Keti Bandar</option>
                                <option class="option" value="Khairpur">Khairpur</option>
                                <option class="option" value="Khanaspur">Khanaspur</option>
                                <option class="option" value="Khanewal">Khanewal</option>
                                <option class="option" value="Kharan">Kharan</option>
                                <option class="option" value="kharian">kharian</option>
                                <option class="option" value="Khokhropur">Khokhropur</option>
                                <option class="option" value="Khora">Khora</option>
                                <option class="option" value="Khushab">Khushab</option>
                                <option class="option" value="Khuzdar">Khuzdar</option>
                                <option class="option" value="Kikki">Kikki</option>
                                <option class="option" value="Klupro">Klupro</option>
                                <option class="option" value="Kohan">Kohan</option>
                                <option class="option" value="Kohat">Kohat</option>
                                <option class="option" value="Kohistan">Kohistan</option>
                                <option class="option" value="Kohlu">Kohlu</option>
                                <option class="option" value="Korak">Korak</option>
                                <option class="option" value="Korangi">Korangi</option>
                                <option class="option" value="Kot Sarae">Kot Sarae</option>
                                <option class="option" value="Kotli">Kotli</option>
                                <option class="option" value="Lahore">Lahore</option>
                                <option class="option" value="Larkana">Larkana</option>
                                <option class="option" value="Lahri">Lahri</option>
                                <option class="option" value="Lakki Marwat">Lakki Marwat</option>
                                <option class="option" value="Lasbela">Lasbela</option>
                                <option class="option" value="Latamber">Latamber</option>
                                <option class="option" value="Layyah">Layyah</option>
                                <option class="option" value="Leiah">Leiah</option>
                                <option class="option" value="Liari">Liari</option>
                                <option class="option" value="Lodhran">Lodhran</option>
                                <option class="option" value="Loralai">Loralai</option>
                                <option class="option" value="Lower Dir">Lower Dir</option>
                                <option class="option" value="Shadan Lund">Shadan Lund</option>
                                <option class="option" value="Multan">Multan</option>
                                <option class="option" value="Mandi Bahauddin">Mandi Bahauddin</option>
                                <option class="option" value="Mansehra">Mansehra</option>
                                <option class="option" value="Mian Chanu">Mian Chanu</option>
                                <option class="option" value="Mirpur">Mirpur</option>
                                <option class="option" value="Moro, Pakistan|Moro">Moro</option>
                                <option class="option" value="Mardan">Mardan</option>
                                <option class="option" value="Mach">Mach</option>
                                <option class="option" value="Madyan">Madyan</option>
                                <option class="option" value="Malakand">Malakand</option>
                                <option class="option" value="Mand">Mand</option>
                                <option class="option" value="Manguchar">Manguchar</option>
                                <option class="option" value="Mashki Chah">Mashki Chah</option>
                                <option class="option" value="Maslti">Maslti</option>
                                <option class="option" value="Mastuj">Mastuj</option>
                                <option class="option" value="Mastung">Mastung</option>
                                <option class="option" value="Mathi">Mathi</option>
                                <option class="option" value="Matiari">Matiari</option>
                                <option class="option" value="Mehar">Mehar</option>
                                <option class="option" value="Mekhtar">Mekhtar</option>
                                <option class="option" value="Merui">Merui</option>
                                <option class="option" value="Mianwali">Mianwali</option>
                                <option class="option" value="Mianez">Mianez</option>
                                <option class="option" value="Mirpur Batoro">Mirpur Batoro</option>
                                <option class="option" value="Mirpur Khas">Mirpur Khas</option>
                                <option class="option" value="Mirpur Sakro">Mirpur Sakro</option>
                                <option class="option" value="Mithi">Mithi</option>
                                <option class="option" value="Mongora">Mongora</option>
                                <option class="option" value="Murgha Kibzai">Murgha Kibzai</option>
                                <option class="option" value="Muridke">Muridke</option>
                                <option class="option" value="Musa Khel Bazar">Musa Khel Bazar</option>
                                <option class="option" value="Muzaffar Garh">Muzaffar Garh</option>
                                <option class="option" value="Muzaffarabad">Muzaffarabad</option>
                                <option class="option" value="Nawabshah">Nawabshah</option>
                                <option class="option" value="Nazimabad">Nazimabad</option>
                                <option class="option" value="Nowshera">Nowshera</option>
                                <option class="option" value="Nagar Parkar">Nagar Parkar</option>
                                <option class="option" value="Nagha Kalat">Nagha Kalat</option>
                                <option class="option" value="Nal">Nal</option>
                                <option class="option" value="Naokot">Naokot</option>
                                <option class="option" value="Nasirabad">Nasirabad</option>
                                <option class="option" value="Nauroz Kalat">Nauroz Kalat</option>
                                <option class="option" value="Naushara">Naushara</option>
                                <option class="option" value="Nur Gamma">Nur Gamma</option>
                                <option class="option" value="Nushki">Nushki</option>
                                <option class="option" value="Nuttal">Nuttal</option>
                                <option class="option" value="Okara">Okara</option>
                                <option class="option" value="Ormara">Ormara</option>
                                <option class="option" value="Peshawar">Peshawar</option>
                                <option class="option" value="Panjgur">Panjgur</option>
                                <option class="option" value="Pasni City">Pasni City</option>
                                <option class="option" value="Paharpur">Paharpur</option>
                                <option class="option" value="Palantuk">Palantuk</option>
                                <option class="option" value="Pendoo">Pendoo</option>
                                <option class="option" value="Piharak">Piharak</option>
                                <option class="option" value="Pirmahal">Pirmahal</option>
                                <option class="option" value="Pishin">Pishin</option>
                                <option class="option" value="Plandri">Plandri</option>
                                <option class="option" value="Pokran">Pokran</option>
                                <option class="option" value="Pounch">Pounch</option>
                                <option class="option" value="Quetta">Quetta</option>
                                <option class="option" value="Qambar">Qambar</option>
                                <option class="option" value="Qamruddin Karez">Qamruddin Karez</option>
                                <option class="option" value="Qazi Ahmad">Qazi Ahmad</option>
                                <option class="option" value="Qila Abdullah">Qila Abdullah</option>
                                <option class="option" value="Qila Ladgasht">Qila Ladgasht</option>
                                <option class="option" value="Qila Safed">Qila Safed</option>
                                <option class="option" value="Qila Saifullah">Qila Saifullah</option>
                                <option class="option" value="Rawalpindi">Rawalpindi</option>
                                <option class="option" value="Rabwah">Rabwah</option>
                                <option class="option" value="Rahim Yar Khan">Rahim Yar Khan</option>
                                <option class="option" value="Rajan Pur">Rajan Pur</option>
                                <option class="option" value="Rakhni">Rakhni</option>
                                <option class="option" value="Ranipur">Ranipur</option>
                                <option class="option" value="Ratodero">Ratodero</option>
                                <option class="option" value="Rawalakot">Rawalakot</option>
                                <option class="option" value="Renala Khurd">Renala Khurd</option>
                                <option class="option" value="Robat Thana">Robat Thana</option>
                                <option class="option" value="Rodkhan">Rodkhan</option>
                                <option class="option" value="Rohri">Rohri</option>
                                <option class="option" value="Sialkot">Sialkot</option>
                                <option class="option" value="Sadiqabad">Sadiqabad</option>
                                <option class="option" value="Safdar Abad- (Dhaban Singh)">Safdar Abad</option>
                                <option class="option" value="Sahiwal">Sahiwal</option>
                                <option class="option" value="Saidu Sharif">Saidu Sharif</option>
                                <option class="option" value="Saindak">Saindak</option>
                                <option class="option" value="Sakrand">Sakrand</option>
                                <option class="option" value="Sanjawi">Sanjawi</option>
                                <option class="option" value="Sargodha">Sargodha</option>
                                <option class="option" value="Saruna">Saruna</option>
                                <option class="option" value="Shabaz Kalat">Shabaz Kalat</option>
                                <option class="option" value="Shadadkhot">Shadadkhot</option>
                                <option class="option" value="Shahbandar">Shahbandar</option>
                                <option class="option" value="Shahpur">Shahpur</option>
                                <option class="option" value="Shahpur Chakar">Shahpur Chakar</option>
                                <option class="option" value="Shakargarh">Shakargarh</option>
                                <option class="option" value="Shangla">Shangla</option>
                                <option class="option" value="Sharam Jogizai">Sharam Jogizai</option>
                                <option class="option" value="Sheikhupura">Sheikhupura</option>
                                <option class="option" value="Shikarpur">Shikarpur</option>
                                <option class="option" value="Shingar">Shingar</option>
                                <option class="option" value="Shorap">Shorap</option>
                                <option class="option" value="Sibi">Sibi</option>
                                <option class="option" value="Sohawa">Sohawa</option>
                                <option class="option" value="Sonmiani">Sonmiani</option>
                                <option class="option" value="Sooianwala">Sooianwala</option>
                                <option class="option" value="Spezand">Spezand</option>
                                <option class="option" value="Spintangi">Spintangi</option>
                                <option class="option" value="Sui">Sui</option>
                                <option class="option" value="Sujawal">Sujawal</option>
                                <option class="option" value="Sukkur">Sukkur</option>
                                <option class="option" value="Suntsar">Suntsar</option>
                                <option class="option" value="Surab">Surab</option>
                                <option class="option" value="Swabi">Swabi</option>
                                <option class="option" value="Swat">Swat</option>
                                <option class="option" value="Tando Adam">Tando Adam</option>
                                <option class="option" value="Tando Bago">Tando Bago</option>
                                <option class="option" value="Tangi">Tangi</option>
                                <option class="option" value="Tank City">Tank City</option>
                                <option class="option" value="Tar Ahamd Rind">Tar Ahamd Rind</option>
                                <option class="option" value="Thalo">Thalo</option>
                                <option class="option" value="Thatta">Thatta</option>
                                <option class="option" value="Toba Tek Singh">Toba Tek Singh</option>
                                <option class="option" value="Tordher">Tordher</option>
                                <option class="option" value="Tujal">Tujal</option>
                                <option class="option" value="Tump">Tump</option>
                                <option class="option" value="Turbat">Turbat</option>
                                <option class="option" value="Umarao">Umarao</option>
                                <option class="option" value="Umarkot">Umarkot</option>
                                <option class="option" value="Upper Dir">Upper Dir</option>
                                <option class="option" value="Uthal">Uthal</option>
                                <option class="option" value="Vehari">Vehari</option>
                                <option class="option" value="Veirwaro">Veirwaro</option>
                                <option class="option" value="Vitakri">Vitakri</option>
                                <option class="option" value="Wadh">Wadh</option>
                                <option class="option" value="Wah Cantt">Wah Cantt</option>
                                <option class="option" value="Warah">Warah</option>
                                <option class="option" value="Washap">Washap</option>
                                <option class="option" value="Wasjuk">Wasjuk</option>
                                <option class="option" value="Wazirabad">Wazirabad</option>
                                <option class="option" value="Yakmach">Yakmach</option>
                                <option class="option" value="Zhob">Zhob</option>
                                <option class="option" value="Other">Other</option>
                                <option class="option" value="Bahawalnagar">Bahawalnagar</option>
                                <option class="option" value="Chishtian">Chishtian</option>
                                <option class="option" value="Fort Abbas">Fort Abbas</option>
                                <option class="option" value="Haroonabad">Haroonabad</option>
                                <option class="option" value="Minchinabad">Minchinabad</option>
                                <option class="option" value="Ahmadpur East">Ahmadpur East</option>
                                <option class="option" value="Hasilpur">Hasilpur</option>
                                <option value="Khanpur">Khanpur</option>
                                <option value="Liaquatpur">Liaquatpur</option>
                                <option value="Sadiqabad">Sadiqabad</option>
                                <option value="Alipur">Alipur</option>
                                <option value="Jatoi">Jatoi</option>
                                <option value="Kot addu">Kot addu</option>
                                <option value="Jampur">Jampur</option>
                                <option value="Rojhan">Rojhan</option>
                                <option value="Layyah	chaubara">Layyah	chaubara</option>
                                <option value="Karor lal esan">Karor lal esan</option>
                                <option value="Taunsa">Taunsa</option>
                                <option value="Kot chutta">Kot chutta</option>
                                <option value="Kot chutta">Kot Mithan</option>
                                <option value="Arifwala">Arifwala</option>
                                <option value="Jalalpur pirwala">Jalalpur pirwala</option>
                                <option value="Shujabad">Shujabad</option>
                                <option value="Vehari burewala">Vehari	burewala</option>
                                <option value="Mailsi">Mailsi</option>
                                <option value="Vehari">Vehari</option>
                                <option value="Dunyapur">Dunyapur</option>
                                <option value="Kahror pacca">Kahror pacca</option>
                                <option value="Jehanian">Jehanian</option>
                                <option value="Kabirwala">Kabirwala</option>
                                <option value="Mian channu">Mian channu</option>
                                <option class="option" value="Khairpur Tamewali">Khairpur Tamewali</option>
                                <option value="Yazman">Yazman</option>
                            </select>
                        </div><!-- /.form-group -->

                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone</label>
                            <input tabindex=15 class="form-control" maxlength="11" type="text" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" id="phone" name="patPhone" placeholder="Type Phone Number" maxlength="11" />
                        </div><!-- /.form-group -->

                    </div><!-- /.col -->
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Entitled</label>
                            <br>
                            <input tabindex=16 type="radio"  name="entitled"
                            class="custom-radio entitled-rad" id="entitled-true" value="Yes" ><label
                            class="radio-labels">Yes</label>
                            <input type="radio"  name="entitled"
                            class="custom-radio entitled-rad" id="entitled-false" value="No" checked="checked"><label
                            class="radio-labels"> No</label>
                            <br>
                            <label class="customlabel hide-label">(If Yes attach valid documents)</label>
                        </div><!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Attach Photo (Optional)</label>
                        <?php if (!empty($error)) {
                            echo $error;
                        } ?>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                            style="width: 65px; height: 70px;">
                            <i class="fa fa-user" aria-hidden="true" style="font-size: 4em;"></i>
                        </div>
                        <div style="display: inline;">
                            <span class="btn btn-default btn-file"><span
                                class="fileinput-new">Select image</span><span
                                class="fileinput-exists">Change</span>
                                <input tabindex=17 type="file" name="patientphoto" size="20"/>
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>
    <div class="box  box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Guardian Information</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                    class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Guardian Name</label>
                        <input class="form-control" type="text" maxlength="12" name="garName"  placeholder="Enter Guardian Name" id="id17" tabindex=18 >
                    </div>
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>CNIC</label>
                        <input class="form-control" type="text" maxlength="15" name="garCnic" id="garcnic" placeholder="Type CNIC number" maxlength="15" autocomplete="off" tabindex=19 onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" />
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input class="form-control" type="text" maxlength="11" name="garPhone" placeholder="Type Phone Number" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" maxlength="11" id="id19" tabindex=20 />
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-control gar-relation" style="width: 100%;" name="garRel" id="id20" tabindex=21 >
                            <option></option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Aunt">Aunt</option>
                            <option value="Father in Law">Father in Law</option>
                            <option value="Father in Law">Mother in Law</option>
                            <option value="Brother in Law">Brother in Law</option>
                            <option value="Sister in Law">Sister in Law</option>
                            <option value="Grandmother">Grandmother</option>
                            <option value="Grandfather">Grandfather</option>
                            <option value="Niece">Niece</option>
                            <option value="Nephew">Nephew</option>
                            <option value="Husband">Husband</option>
                            <option value="Wife">Wife</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Nephew">Cousin</option>
                            <option value="Grandson">Grandson</option>
                            <option value="Granddaughter">Granddaughter</option>
                            <option value="Neighbour">Neighbour</option>
                        </select>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <div class="box  box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Admission Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Admitted Through</label>
                            <select   class="form-control admitted-th" style="width: 100%;" name="admitted-through" id="id21" tabindex="22">
                                <option></option>
                                <option value="OPD">OPD</option>
                                <option value="Emergency">Emergency</option>
                                <option value="Private Clinic">Private Clinic</option>
                            </select>
                        </div><!-- /.col -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Shifted From</label>
                            <input tabindex=23 class="form-control"  type="text" name="patShiftedFrom" id="Disease" maxlength="10" placeholder="Type Shifted From">
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ward Number</label>
                            <select tabindex=24  class="form-control ward-name" style="width: 100%;" name="wardName" maxlength="10" id="id23">
                            </select>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bed Number</label>
                            <select  class="form-control beds" style="width: 100%;" name="bedNumber" id="id24" tabindex=25 >
                                <!-- Male Ward Beds -->
                            </select>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Admission Date &amp; Time</label>
                            <div class="input-group date bootstrap-timepicker timepicker">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <input tabindex=25 type="text" class="form-control pull-right" id="datepicker-adm" name="AdmDate" autocomplete="off" placeholder="Set Date">
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <input type="text" class="form-control pull-right" id="timepicker-adm" name="AdmTime" placeholder="Set Time" tabindex=26 />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Is a Free Care Patient?</label>
                            <br>
                            <input type="radio"  name="freeCarePatient"
                            class="custom-radio freecare-rad" value="1" checked><label
                            class="radio-labels">Yes</label>
                            <input type="radio"  name="freeCarePatient"
                            class="custom-radio freecare-rad" value="0" ><label
                            class="radio-labels"> No</label>
                            <br>
                        </div><!-- /.form-group -->
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <!--                        <input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                            <button type="button" class="btn bg-blue margin submit-btn custom-submit-btn"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;Admit Patient
                            </button>

                        </div>
                    </div><!-- /.col -->
                </div>

            </div>

            <div class="modal fade" role="dialog" id="print-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                                <h4 class="modal-title">Confirmation Message</h4>
                            </div>
                            <div class="modal-body">
                                <p>Do you want to save the admission sheet?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn bg-blue" value="Save Information" tabindex=26 />

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong>
        All rights
        reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
