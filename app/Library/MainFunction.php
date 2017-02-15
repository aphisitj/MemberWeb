<?php
namespace App\Library;

use DB;
use Request;
use URL;
use Intervention\Image\ImageManagerStatic as Image;
use Config;
use Storage;

class MainFunction {
    public function db_add($objData,$pkField,$input,$filedList)
    {
        foreach($filedList as $field) {
            $objData->$field = $input[$field];
        }
        $objData->save();
        return $objData->$pkField;
    }
    public function db_update($objData,$pkField,$input,$filedList)
    {
        foreach($filedList as $field) {
            $objData->$field = $input[$field];
        }
        $objData->save();
        return $objData->$pkField;
    }

    public function db_delete($objData)
    {
        $objData->deleted_at = date('Y-m-d H:i:s');
        $objData->save();
    }
    public function sorting($txtField,$field,$orderBy,$sortBy,$strParam,$alt)
    {
        if($field == $orderBy && $sortBy == 'desc'){
            $sortBy = "asc"; $icon = "<i class='fa fa-sort-desc'></i>";
        } else if($field == $orderBy && $sortBy == 'asc') {
            $sortBy = "desc"; $icon = "<i class='fa fa-sort-asc'></i>";
        } else {
            $sortBy = "desc"; $icon = "";
        }

        return "<a href='".URL::to(Request::path())."?order_by=".$field."&sort_by=".$sortBy.$strParam."' title='".$alt."'>$txtField $icon</a>";
    }
    public function parameter($a_input)
    {
        $strParam = '';
        foreach($a_input as $key => $values){
            if(!empty($values)) $strParam .= '&'.$key.'='.$values;
        }
        return $strParam;
    }

    public function loop_category($query,$lang) {
        $check = 0;
        $selCategory = $query;
        foreach($selCategory as $fieldCate)
        {
            $category_name = $fieldCate->category_name;
            $path = $category_name;
            $parent = $fieldCate->parent_category_id;
            while($parent != 0)
            {
                $query2 = DB::table('category')
                    ->join('category_tr','category.category_id','=','category_tr.category_id')
                    ->select('category.category_id','category.parent_category_id','category_tr.category_name')
                    ->whereNull('category.deleted_at')
                    ->whereNull('category_tr.deleted_at')
                    ->where('category_tr.lang',$lang)
                    ->where('category.category_id',$parent)
                    ->orderBy('category_tr.category_name','asc')->get();

                foreach($query2 as $fieldSubCate)
                {
                    $category_name2 = $fieldSubCate->category_name;
                    // New path and parent
                    $path = $category_name2 ." > " . $path ;
                    $parent = $fieldSubCate->parent_category_id;
                }
            }
            $list_cat[$fieldCate->category_id] = $path;
        }
        // เรียงค่าใน array จากน้อยไปมาก
        asort ($list_cat);
        //return $list_cat;
        return $list_cat;
    }

    public function list_category_photo($category_id,$lang){
        $list_category_value = "";
        $query = DB::table('category')
            ->join('category_tr','category.category_id','=','category_tr.category_id')
            ->select('category.category_id','category.parent_category_id','category_tr.category_name')
            ->whereNull('category.deleted_at')->whereNull('category_tr.deleted_at')->where('category_tr.lang',$lang)->where('category.category_id',$category_id)->get();
        $list_cat = $this->loop_category($query,$lang);
        foreach($list_cat as $key => $value){
            $list_category_value .= $value;
        }
        return $list_category_value;
    }
    public function list_category($category_id,$lang){
        $list_category_value = "";
        $query = DB::table('category')
            ->join('category_tr','category.category_id','=','category_tr.category_id')
            ->select('category.category_id','category.parent_category_id','category_tr.category_name')
            ->whereNull('category.deleted_at')->whereNull('category_tr.deleted_at')->where('category_tr.lang',$lang)->where('category.category_id',$category_id)->get();
        $list_cat = $this->loop_category($query,$lang);
        foreach($list_cat as $key => $value){
            $list_category_value .= $value;
        }
        return $list_category_value;
    }

    public function search_select_category($search_category_id,$category_id,$root,$lang){
        // $search_category_id from search select box
        // $root 0 is parent_category_id=0
        $option = '';
        $query = DB::table('category')
            ->join('category_tr','category.category_id','=','category_tr.category_id')
            ->select('category.category_id','category.parent_category_id','category_tr.category_name')
            ->whereNull('category.deleted_at')->whereNull('category_tr.deleted_at')->where('category_tr.lang',$lang);
        if(!empty($category_id))
        {
            $query = $query->where('category.category_id','!=',$category_id);
        }
        if(!empty($root) || $root=='0')
        {
            $query = $query->where('category.parent_category_id','0');
        }
        $query = $query->orderBy('category_tr.category_name','asc')->get();

        $list_cat = $this->loop_category($query,$lang);
        foreach($list_cat as $key => $value){
            $select = "";
            if($search_category_id == $key ) $select = "selected";
            $option .= "<option value=\"".$key."\" ".$select.">".$value."</option>";
        }
        return $option;
//        return $list_cat;
    }

    public function month_list($selected,$type = null,$lang){
        // $type == full : Full month
        $list_menu = "";
        if($lang == 'TH')
        {
            $list_menu .= "<option value=\"\">เดือน</option>";
            if($type == 'full')
            {
                $month = array(1 => "มกราคม",2 => "กุมภาพันธ์",3 => "มีนาคม",4 => "เมษายน",5 => "พฤษภาคม",6 => "มิถุนายน",7 => "กรกฎาคม",8 => "สิงหาคม",9 => "กันยายน",10 => "ตุลาคม",11 => "พฤศจิกายน",12 => "ธันวาคม");
            }
            else
            {
                $month = array(1 => "ม.ค.",2 => "ก.พ.",3 => "มี.ค.",4 => "เม.ย.",5 => "พ.ค.",6 => "มิ.ย.",7 => "ก.ค.",8 => "ส.ค.",9 => "ก.ย.",10 => "ต.ค.",11 => "พ.ย.",12 => "ธ.ค.");
            }
        }
        else
        {
            $list_menu .= "<option value=\"\">Month</option>";
            if($type == 'full')
            {
                $month = array(1 => "January",2 => "February",3 => "March",4 => "April",5 => "May",6 => "June",7 => "July",8 => "August",9 => "September",10 => "October",11 => "November",12 => "December");
            }
            else
            {
                $month = array(1 => "Jan",2 => "Feb",3 => "Mar",4 => "Apr",5 => "May",6 => "Jun",7 => "Jul",8 => "Aug",9 => "Sept",10 => "Oct",11 => "Nov",12 => "Dec");
            }
        }

        foreach($month as $key => $value){
            if($selected == $key) $val = "selected='selected'"; else $val = "";
            $list_menu .= "<option value=\"$key\" $val >$value</option>";
        }
        return 	$list_menu;
    }

    public function day_list($selected,$lang){
        $list_menu = "";
        if($lang == 'TH') $list_menu .= "<option value=\"\">วัน</option>";
        else $list_menu .= "<option value=\"\">Day</option>";

        for($day=1;$day<=31;$day++){
            if ( $selected == $day ) $val = "selected='selected'"; else $val = "";
            $list_menu .= "<option value=\"$day\" $val >$day</option>";
        }
        return 	$list_menu;
    }

    public function gen_random ($length,$type){
        if($type == '1') $keychars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        else if($type == '2') $keychars = '123456789';
        else if($type == '3') $keychars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        else if($type == '4') $keychars = 'abcdefghijkmnpqrstuvwxyz';
        else if($type == '5') $keychars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        else if($type == '6') $keychars = 'abcdefghijkmnpqrstuvwxyz23456789';
        else if($type == '7') $keychars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

        // RANDOM KEY GENERATOR
        $randkey = "";
        $max=strlen($keychars)-1;
        for ($i=0;$i<=$length;$i++) {
            $randkey .= substr($keychars, rand(0, $max), 1);
        }
        return $randkey;
    }

    public function gen_order_no($tbName,$pkField,$fieldSelected){
        $queryLast = DB::table($tbName)->select($fieldSelected)->orderBy($pkField,'desc')->skip('0')->take('1')->get();
        foreach($queryLast as $fieldLast){
            $lastNo = $fieldLast->$fieldSelected;
        }
        $currentYear = substr(date('Y'),2,2);
        $currentMonth = date('m');

        $lastYear = substr($lastNo,0,2);
        $lastMonth = substr($lastNo,2,2);
        $lastRandomNo = substr($lastNo,6,4);

        if($lastMonth < $currentMonth || $lastYear < $currentYear){
            $newRandomNo = "0001";
        }else{
            $newRandomNo = $lastRandomNo+1;
            $newRandomNo = str_pad($newRandomNo,4,"0",STR_PAD_LEFT);
        }
        $newNo = substr(date('Y'),2,2).date("md").$newRandomNo;

        return $newNo;
    }
    public function format_date_en ($value,$type) {
        list ($s_date,$s_time)  = explode (" ", $value);
        list ($s_year, $s_month, $s_day) = explode ("-", $s_date);
        if(!empty($s_time)){
            list ($s_hour, $s_minute, $s_second) = explode (":", $s_time);
        }else{
            $s_time = "00:00:00";
            list ($s_hour, $s_minute, $s_second) = explode (":", $s_time);
        }
        $s_month +=0;
        $s_day += 0;
        if ($s_day == "0") return "";
        $mktime = mktime ($s_hour, $s_minute, $s_second, $s_month, $s_day, $s_year);
        switch ($type) {
            case "1" :  // Friday 11 November 2005
                $msg = date ("l d F Y", $mktime);
                break;
            case "2" :  // 11 Nov 05
                $msg = date ("d M y", $mktime);
                break;
            case "3" :  // Friday 11 November 2005 00:11
                $msg = date ("l d F Y H:i", $mktime);
                break;
            case "4" :  // 11 Nov 05 00:11
                $msg = date ("d M y  H:i", $mktime);
                break;
            case "5" :  // 11 Nov 05 00:11
                $msg = date ("d M Y", $mktime);
                break;
            case "6" :  // Jan 24, 2013
                $msg = date ("M d, Y", $mktime);
                break;
            case "7" :  // Jan 24, 2013
                $msg = date ("d M Y", $mktime);
                break;
        }
        return ($msg);
    }
    public function format_date_th ($value,$type) {
        if($value=='') return $value;
        if (strlen ($value) > 10) {
            list ($s_date,$s_time)  = explode (" ", $value);
            list ($s_year, $s_month, $s_day) = explode ("-", $s_date);
            list ($s_hour, $s_minute, $s_second) = explode (":", $s_time);
        }
        else
        {
            list ($s_year, $s_month, $s_day) = explode ("-", $value);
        }
        $s_month +=0;
        $s_day += 0;
        if ($s_day == "0") return "";
        $s_year += 543;
        $month_full_th = array ('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
        $month_brief_th = array ('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');
        $day_of_week = array ('อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์');
        switch ($type) {
            case "1" : // วันที่ 4 พฤศจิกายน 2548
                $msg =  $s_day . " " .  $month_full_th[$s_month]  . " " .  $s_year ;
                break;
            case "2" :  // 4 พ.ย. 2548
                $msg =  $s_day . " " .  $month_brief_th[$s_month]  . " " .  $s_year ;
                break;
            case "3" :  // วันที่ 4 พฤศจิกายน 2548 เวลา 14.11 น.
                $msg =  $s_day . " " .  $month_full_th[$s_month]  . " " .  $s_year . " เวลา " . $s_hour . "." . $s_minute . " น." ;
                break;
            case "4" :  // 4 พ.ย. 2548 14.11 น.
                $msg =  $s_day . " " .  $month_brief_th[$s_month]  . " " .  $s_year . "  " . $s_hour . "." . $s_minute . " น." ;
                break;
        }
        return ($msg);

    }

    public function image_resize($photo , $destinationPath , $size,$filename)
    {
        $img = new Image();
        $set_width = $size;
        $set_height = $size;
        $normal_width = $img->make($photo)->width();
        $normal_height = $img->make($photo)->height();
        if($normal_width > $normal_height){
            // ความกว้างของรูปปกติ มากกว่า ความกว้างที่จะรีไซต์
            if($normal_width > $set_width){
                $new_width = $set_width;
                $new_height = round($normal_height * $set_width / $normal_width);
            }else{
                $new_width = $normal_width;
                $new_height = $normal_height;
            }
        }else{
            // ความสูงของรูปปกติ มากกว่า ความสูงที่จะรีไซต์
            if($normal_height > $set_height){
                $new_width = round($normal_width * $set_height / $normal_height);
                $new_height = $set_height;
            }else{
                $new_width = $normal_width;
                $new_height = $normal_height;
            }
        }
//        echo "--------------"."<br>";
//        echo $new_width." ".$new_height."<br>";
//        echo $destinationPath.'/'.$size.'/'.$filename;
        $img = new Image();
        $img->make($photo)->resize($new_width,$new_height)->save($destinationPath.'/'.$size.'/'.$filename);

    }

    public function img_full_resize($photo, $destinationPath, $filename)
    {
        $img = new Image();                                     // get Class Image
        $img->make($photo)->save($destinationPath . '/' . $filename);   // move image into storage

        $a_resize = Config::get('mainConfig.a_resize');
        foreach ($a_resize as $size) {
            $this->image_resize($photo, $destinationPath,$size, $filename);
        }
    }

    public function del_storage($old_path,$old_name)
    {
        $a_resize = Config::get('mainConfig.a_resize');
        if(file_exists($old_path.$old_name)){
            Storage::files($old_path.$old_name);
            foreach($a_resize as $size) {
                Storage::files($old_path.$size.'/'.$old_name);
            }
        }
    }





}
?>