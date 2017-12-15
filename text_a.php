<?php
// Сниппет будет получать данные из формы методом POST
$tel = (isset($_POST['16']))?$_POST['16']:'';//tel
$mail = (isset($_POST['17']))?$_POST['17']:'';//mail
$fio = (isset($_POST['35']))?$_POST['35']:'';//fio
$title = (isset($_POST['pagetitle']))?$_POST['pagetitle']:'';//pagetitle
$name = (isset($_POST['6']))?$_POST['6']:'';//имя
$date = (isset($_POST['9']))?$_POST['9']:'';//год рождения
$gender = (isset($_POST['34']))?$_POST['34']:'';//пол
$height = (isset($_POST['1']))?$_POST['1']:'';//рост
$chest = (isset($_POST['2']))?$_POST['2']:'';//грудь
$thalia = (isset($_POST['3']))?$_POST['3']:'';//талия
$hip = (isset($_POST['4']))?$_POST['4']:'';//бедра
$face = (isset($_POST['13']))?$_POST['13']:'';//тип внешности
$eyes = (isset($_POST['33']))?$_POST['33']:'';//цвет глаз
$hair = (isset($_POST['31']))?$_POST['31']:'';//цвет волос
$l_hair = (isset($_POST['32']))?$_POST['32']:'';//цвет волос
$weight = (isset($_POST['47']))?$_POST['47']:'';//Вес
$clothing = (isset($_POST['5']))?$_POST['5']:'';//р-р одежды
$shoes = (isset($_POST['12']))?$_POST['12']:'';//р-р обуви
$get_services = (isset($_POST['52']))?$_POST['52']:'';//Работает в категориях
foreach ($get_services as $value)
$get_services .= $value.'||';
$get_services = rtrim ($get_services, "|");
$get_services = ltrim ($get_services, "Array");

$work = (isset($_POST['14']))?$_POST['14']:'';//
$city = (isset($_POST['10']))?$_POST['10']:'';
$w_sap = (isset($_POST['48']))?$_POST['48']:'';
$skype = (isset($_POST['44']))?$_POST['44']:'';
$instagram = (isset($_POST['41']))?$_POST['41']:'';
$vk = (isset($_POST['42']))?$_POST['42']:'';
$facebook = (isset($_POST['43']))?$_POST['43']:'';
$portf = (isset($_POST['28']))?$_POST['28']:'';
$content = (isset($_POST['30']))?$_POST['30']:'';
$abroad = (isset($_POST['18']))?$_POST['18']:'';//Готовность работать за границей

//Языки

$lang = (isset($_POST['английский']))?$_POST['английский']:'';//Знание языков
$lang2 = (isset($_POST['немецкий']))?$_POST['немецкий']:'';//Знание языков
$lang3 = (isset($_POST['французский']))?$_POST['французский']:'';//Знание языков
$lang4 = (isset($_POST['итальянский']))?$_POST['итальянский']:'';//Знание языков
$lang5 = (isset($_POST['испанский']))?$_POST['испанский']:'';//Знание языков
$lang6 = (isset($_POST['китайский']))?$_POST['китайский']:'';//Знание языков
$lang7 = (isset($_POST['японский']))?$_POST['японский']:'';//Знание языков
$lang_out .= $lang.'||'. $lang2.'||'. $lang3.'||'. $lang4.'||'. $lang5.'||'. $lang6.'||'. $lang7.'||';
$lang_out = ltrim ($lang_out, "|");
$lang_out = rtrim ($lang_out, "|");

//test ajax
$ajax = (isset($_POST['lastname']))?$_POST['lastname']:'';

echo $ajax;
//end test ajax

$introtext = $_POST['introtext'];
$description = $_POST['description'];
$parent = $_POST['parent'];
$template = $_POST['template'];
$publishedon = date('Y-m-d H:i:s');
$sub = $_POST['sub'];
// Если некоторые значения не будут указаны,
// они будут установлены по умолчанию
if (!$introtext) $introtext = $title;
if (!$parent) $parent =819;//папка в которую все пишется локал 819 сайт 301
if (!$template) $template = 3;

// Создаем ресурс
$newResource = $modx->newObject('modResource');
 $docId1 = $newResource->get('id');
// Заполняем нужные значения
$newResource->set('pagetitle',$fio);
//$newResource->set('longtitle',$title);
$newResource->set('description',$description);
$newResource->set('template',$template);
$newResource->set('published',0);
$newResource->set('parent',$parent);
$newResource->set('publishedon',$publishedon);
//$newResource->set('content',$content);

if(!empty($sub)){
$newResource->save();

// получаем id свежесозданного ресурса
$docId = $newResource->get('id');
// и заполняем различными tv-шками
$tvs = $modx->getObject('modResource', $docId);

$tvs->set('alias',"id$docId");//устанавливаем alias в виде idxxx
$tvs->setTVValue(16, $tel);//tel
$tvs->setTVValue(17, $mail);//mail
$tvs->setTVValue(35, $fio);//fio
$tvs->setTVValue(9, $date);//год рождения
$tvs->setTVValue(34, $gender);//пол
$tvs->setTVValue(1, $height);//рост
$tvs->setTVValue(2, $chest);//Грудь
$tvs->setTVValue(3, $thalia);//талия
$tvs->setTVValue(4, $hip);//бедра
$tvs->setTVValue(6, $name);//бедра

//$tvs->setTVValue('GalleryAlbum', $img);//бедра
$tvs->setTVValue(13, $face);//тип внешности
$tvs->setTVValue(33, $eyes);//цвет глаз
$tvs->setTVValue(31, $hair);//цвет волос
$tvs->setTVValue(32, $l_hair);//длина волос
$tvs->setTVValue(47, $weight);//Вес
$tvs->setTVValue(5, $clothing);//р-р одежды
$tvs->setTVValue(12, $shoes);//р-р обуви
$tvs->setTVValue(15, $lang_out);//Языки
$tvs->setTVValue(18, $abroad);//Готовность работать за границей
$tvs->setTVValue(52, $get_services);//Категории
$tvs->setTVValue(14, $work);//work
$tvs->setTVValue(10, $city);//Место проживания
$tvs->setTVValue(48, $w_sap);
$tvs->setTVValue(44, $skype);
$tvs->setTVValue(41, $instagram);
$tvs->setTVValue(42, $vk);
$tvs->setTVValue(43, $facebook);
$tvs->setTVValue(28, $portf);
$tvs->setTVValue(30, $content);

$tvs->save();

$modx->cacheManager->clearCache();
}

$gender_options = '';
$face_options = '';
$hair_options = '';
$l_hair_options = '';
$eyes_options = '';
$work_options = '';
$language_options = '';
$abroad_options = '';
$services_options = '';
// Формируем данные вывода

$tv_array = array();
$sql = "SELECT id,name,elements FROM modx_site_tmplvars";
$result = $modx->query($sql);

while ($data = $result->fetch(PDO::FETCH_ASSOC))
{
switch ($data['id'])
{
case 13: // Тип внешности
$tv_array['face'][$data['name']] = $data['elements'];
break;
case 31: //Цвет волос
$tv_array['hair'][$data['name']] = $data['elements'];
break;
case 32: //Длина волос
$tv_array['l_hair'][$data['name']] = $data['elements'];
break;
case 33: //Цвет глаз
$tv_array['eyes'][$data['name']] = $data['elements'];
break;
case 14: //Опыт работы
$tv_array['work'][$data['name']] = $data['elements'];
break;
case 15: //Знание языков
$tv_array['language'][$data['name']] = $data['elements'];
break;
case 18: //Готовность работать за границей
$tv_array['abroad'][$data['name']] = $data['elements'];
break;
}
}
$gender_array = array( array('option' => '', 'val' => ''),
  array('option' => 'Mуж', 'val' => 'Mуж'),
  array('option' => 'Жен', 'val' => 'Жен'));
//пол
foreach ($gender_array as $val)
$gender_options .= '<option value="'.$val['option'].'" '.(($val['option'] == $gender)?'selected':'').'>'.$val['val'].'</option>';

$abroad_array = array('Готова к работе за рубежом','Не готова к работе за рубежом' );

//Внешность

foreach ($tv_array['face'] as $key=> $value)$face_array .= " "."||" .$value;
$face_array = explode(",", str_replace("||", ",", $face_array));
$i = 1;
foreach ($face_array as $val)
{
($i == 1)?$face_options .= '<option value="" '.(('' == $face)?'selected':'').'>'.$val.'</option>':$face_options .= '<option value="'.$val.'" '.(($val == $face)?'selected':'').'>'.$val.'</option>';
$i++;
}

//Цвет волос
foreach ($tv_array['hair'] as $key=> $value)$hair_array .= " "."||" .$value;
$hair_array = explode(",", str_replace("||", ",", $hair_array));
$i = 1;
foreach ($hair_array as $val)
{
($i == 1)?$hair_options .= '<option value="" '.(('' == $hair)?'selected':'').'>'.$val.'</option>':$hair_options .= '<option value="'.$val.'" '.(($val == $hair)?'selected':'').'>'.$val.'</option>';
$i++;
}

//Длина волос
foreach ($tv_array['l_hair'] as $key=> $value)$l_hair_array .= " "."||" .$value;
$l_hair_array = explode(",", str_replace("||", ",", $l_hair_array));
$i = 1;
foreach ($l_hair_array as $val)
{
($i == 1)?$l_hair_options .= '<option value="" '.(('' == $l_hair)?'selected':'').'>'.$val.'</option>':$l_hair_options .= '<option value="'.$val.'" '.(($val == $l_hair)?'selected':'').'>'.$val.'</option>';
$i++;
}

//Цвет глаз
foreach ($tv_array['eyes'] as $key=> $value)$eyes_array .= " "."||" .$value;
$eyes_array = explode(",", str_replace("||", ",", $eyes_array));
$i = 1;
foreach ($eyes_array as $val)
{
($i == 1)?$eyes_options .= '<option value="" '.(('' == $eyes)?'selected':'').'>'.$val.'</option>':$eyes_options .= '<option value="'.$val.'" '.(($val == $eyes)?'selected':'').'>'.$val.'</option>';
$i++;
}

//Опыт работы
foreach ($tv_array['work'] as $key=> $value)$work_array .= " "."||" .$value;
$work_array = explode(",", str_replace("||", ",", $work_array));
$i = 1;
foreach ($work_array as $val)
{
($i == 1)?$work_options .= '<option value="" '.(('' == $work)?'selected':'').'>'.$val.'</option>':$work_options .= '<option value="'.$val.'" '.(($val == $work)?'selected':'').'>'.$val.'</option>';
$i++;
}

foreach ($tv_array['language'] as $value)
$language_array .= $value;

$language_array = explode(",", str_replace("||", ",", $language_array));

foreach ($language_array as $val)
$language_options .= '<input type="checkbox" name="'.$val.'" value="'.$val.'" '.(($val == $lang||$val == $lang2||$val == $lang3||$val == $lang4||$val == $lang5||$val == $lang6||$val == $lang7)?'checked':'').'><span>'.$val.'</span>';

//получаем титлы услуг
$services = $modx->getCollection('modResource',array('parent'=>4));

//----------------------------------------------------------------------------------------------------
foreach($services as $key){
$services_options .= '<option value="'.$key->get('id').'" '.(( preg_match('/('.$key->get('id').'\|)|(\|'.$key->get('id').')/',$get_services))?'selected':'').'>'.$key->get('pagetitle').'</option>';
}
//------------------------------------------------------------------------------------------------------------


//воводим id сохраненной анекты
$sub = $_POST['sub'];
$showid = (!empty($sub))?'<div class="show_id">
<span>Анкета сохранена - <a href="[[++site_url]]ID'.$docId.'.html" target="_blank">id'.$docId.'</a>
</span>
</div>':'';

//Загрузка ФОТО

$action = (isset($_POST['sub']))? $_POST['sub'] : '';

switch($action) {
case 'Сохранить':
//получаем ресурс в виде объекта
$item = $modx->getObject('modResource',array(
'id' => $modx->resource->id,
));
if(!$item){
break;
}

//Что это блядь?
//$resourceID = $response->response['object']['id'];

$resourceID = $docId;

//Галлерея-создание
$responseGallery = $modx->runProcessor('mgr/album/create',
array(
'name' => $fio, //
'parent' => 1,
'active' => 1,
'prominent' => 1,
'description' => '',
  ),
array(
'processors_path' => $modx->getOption('core_path') . 'components/gallery/processors/',
  )
  );

$galleryID = $responseGallery->response['object']['id'];
var_dump($galleryID);
//Назначаем галллерею
$item = $modx->getObject('modResource',array(
'id' => $resourceID,
  ));
if($item){
$item->setTVValue(23, $galleryID);
  }

//print_r($resourceID);
//var_dump($_FILES['fileTmp']['name']);

//Заливка файлов

foreach($_FILES['fileTmp']['name'] as $k => $v){
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES['fileTmp']['name'][$k]);
$file_extension = end($temporary);

if ((($_FILES['fileTmp']['type'][$k] == "image/png") || ($_FILES['fileTmp']['type'][$k] == "image/jpg") || ($_FILES['fileTmp']['type'][$k] == "image/jpeg")) && in_array($file_extension, $validextensions)) {

$_FILES['file']['name'] = $_FILES['fileTmp']['name'][$k];
$_FILES['file']['type'] = $_FILES['fileTmp']['type'][$k];
$_FILES['file']['tmp_name'] = $_FILES['fileTmp']['tmp_name'][$k];
$_FILES['file']['error'] = $_FILES['fileTmp']['error'][$k];
$_FILES['file']['size'] = $_FILES['fileTmp']['size'][$k];

$file = $_FILES['fileTmp']['name'][$k];
$arrFileInfo = pathinfo($file);
$fileName = $modx->runSnippet('fileTranslit', array(
'fileName' => $arrFileInfo['filename'],
  ));
$fileName = rand(10000, 99999).'_'.$fileName.'.'.$arrFileInfo['extension'];

$responseGalleryItems = $modx->runProcessor('mgr/item/upload',
array(
'album' => $galleryID,
'active' => 1,
'name' => $fileName,
  ),
array(
'processors_path' => $modx->getOption('core_path') . 'components/gallery/processors/',
  )
  );
  }
  }
/*

$modx->sendRedirect($modx->makeUrl($modx->resource->id, '', array(
'code' => 'ok',
  )));
*/
break;

}
//-------------------------------------------------------------

 $output = $modx->runSnippet("Gallery",array(
  'album' => $galleryID,
'thumbHeight' => '147',
'thumbWidth' => '110',

  ));

$output = str_replace('>', '>,',$output);

$output = explode(',', $output);

$show_gal = '';

//прогон картинок
$i = 1;
foreach ($output as $k => $val)
{
//array_diff($output, [3]);

($i == 1)?$show_gal .= '<div id="filediv"><div id="abcd" class="abcd">'.$val.' <span>Фото лицо</span></div></div>':$show_gal .= '<div id="filediv"><div id="abcd" class="abcd">'.$val.'<span>Фото</span></div></div>';
$i++;
}

//-----------------------------------------------------------------------------------------------
// вывод загруженных картинок после сохнарения
$show_inp = (empty($_FILES))?'<div id="filediv"><input name="fileTmp[]" type="file" id="file"/><span>Фото лицо</span></div>
<div id="filediv"><input name="fileTmp[]" type="file" id="file"/><span>Фото</span></div>
<div id="filediv"><input name="fileTmp[]" type="file" id="file"/><span>Фото</span></div>
<div id="add_more" style="display:block"></div>
':$show_gal;

//Конец загрузки фото

$result = '
<form class="cartform" action="[[~[[*id]]]]" enctype="multipart/form-data" method="post">
<div class="block2 wd114">
<section class="an_blocks">
<div class="cont_bl">
<div class="inf">
<span>Телефон*</span>
<input id="16" class="check_a" type="tel" name="16" value="'.$tel.'" placeholder="+74951236585" required />
</div>
<div class="inf">
<span>Почта*</span>
<input id="17" class="check_a" type="email" name="17" value="'.$mail.'" placeholder="ivanova@yandex.ru" required/>
</div>
<div class="inf">
<span>ФИО*</span>
<input id="35" class="check_a" type="text" name="35" value="'.$fio.'" placeholder="Иванова Агафья Никитишна" required />
</div>
</div>
</section>
<section class="an_blocks">
<div class="features_bl">
<div class="f_wrap" style="width: 45%">
<div class="data">
<div style="margin-bottom: 15px">
<span style="width: 78px; display: block;float: left;">НИК - Имя для Сайта</span>
<input type="text" class="check_a" name="6" value="'.$name.'" placeholder="Лолита" style="width: 136px;margin-left: 10px" required />
</div>
<div class="clear"></div>
<div style="margin-bottom: 5px;">
<span style="width: 77px; display: block;float: left;">Пол</span>
<select name="34" class="a_select" style="width: 66px;margin-left: 10px; required">
'.$gender_options.'
</select>
</div>
<div class="clear"></div>
<div>
<span style="width: 77px; display: block;float: left;" required>Рост</span>
<input type="number" name="1" placeholder="" style="width: 66px;margin-left: 10px" value="'.$height.'" required>
</div>
<div class="clear"></div>
</div>
</div>
<div class="f_wrap" style="width: 55%">
<div class="data">
<div style="margin-bottom: 15px">
<span style="width: 77px; display: block;float: left;">Дата рождения</span>
<input type="date" class="date_a" class="check_a" name="9" style="width: 180px;margin-left: 10px" value="'.$date.'" required>
</div>
<div class="clear"></div>
<div style="width: 55%; float: left;">
<div>
<div style="margin-bottom: 5px;">
<span style="width: 77px; display: block;float: left;">Грудь</span>
<input type="number" name="2" placeholder="" style="width: 66px;margin-left: 10px" value="'.$chest.'" required>
</div>
</div>
<div>
<div style="margin-bottom: 5px;">
<span style="width: 77px; display: block;float: left;">Талия</span>
<input type="number" name="3" placeholder="" style="width: 66px;margin-left: 10px" value="'.$thalia.'" required>
</div>
</div>
<div>
<div style="margin-bottom: 5px;">
<span style="width: 77px; display: block;float: left;">Бедра</span>
<input type="number" name="4" placeholder="" style="width: 66px;margin-left: 10px" value="'.$hip.'" required>
</div>
</div>
</div>
<div style="width: 45%;float: left;font-size: 14px;padding-top: 20px">
<span style="float: left;color: #d7d7d7;font-style: italic;">Введите параметры размеров, цифрами, в см/кг</span>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</section>
<div class="clear"></div>
<section class="an_blocks">
<div class="features_bl">
<div id="maindiv">
'.$show_inp.'
</div>
<div class="clear">
</div>

</div>
</section>
<section class="an_blocks" style="margin-top:20px;">
<div id="dop_inf" style="position:relative">
<span class="item_close">Дополнительная информация</span>
</div>
<div id="dop_data" class="features_bl fz14 data" style="display:none;">
<!--Начало первый блок дата-->
<div class="data_wrap">
<div style="float:left;width:50%;margin-bottom:10px;">
<span style="width: 134px; display: block;float: left;padding-top: 5px;">Тип внешности</span>
<select class="a_select face" name="13" style="width:147px;">
'.$face_options.'
</select>
</div>
<div style="float:left;width:50%;margin-bottom:10px;">
<span style="width: 108px; display: block;float: left;padding-top: 5px;text-align: right;
  padding-right: 5px;">Цвет глаз</span>
<select class="a_select face" name="33" style="width:147px;">
'.$eyes_options.'
</select>
</div>

<div style="float:left;width:50%;margin-bottom:10px;">
<span style="width: 134px; display: block;float: left;padding-top: 5px;">Цвет волос</span>
<select class="a_select face" name="31" style="width:147px;">
'.$hair_options.'
</select>
</div>
<div style="float:left;width:50%;margin-bottom:10px;">
<span style="width: 108px; display: block;float: left;padding-top: 5px;text-align: right;
  padding-right: 5px;">Длина волос</span>
<select class="a_select face" name="32" style="width:147px;">
'.$l_hair_options.'
</select>
</div>
<div style="float:left;width:40%;">
<span style="width: 124px; display: block;float: left;padding-top: 5px;">Вес</span>
<input type="number" name="47" placeholder="" style="width: 70px;margin-left: 10px" value="'.$weight.'">
</div>
<div style="float:left;width:30%;">
<span style="width: 76px; display: block;float: left;padding-top: 5px;">Р-р одежды</span>
<input type="number" name="5" placeholder="" style="width: 70px;margin-left: 10px" value="'.$clothing.'">
</div>
<div style="float:left;width:30%;">
<span style="width: 67px; display: block;float: left;padding-top: 5px;text-align:right">Р-р обуви</span>
<input type="number" name="12" placeholder="" style="width: 70px;margin-left: 10px" value="'.$shoes.'">
</div>
<div class="clear"></div>
</div>
<!--Конец первый блок дата-->
<div class="lang_bl">
<div class="data_wrap">
<div style="float:left;width:120px;height: 85px;">Знание языков</div>
<div style="float:left;width: 425px;">
'.$language_options.'
</div>
<div style="float:left;width:245px;height: 25px;">Готов(ва) работать за рубежом</div>
<div style="float:left;width: 325px;">
<input type="radio" name="18" value="'.$abroad.'"><span style="width: 20px;">Да</span>
<input type="radio" name="18" value="'.$abroad.'"><span style="width: 20px;">Нет</span>
</div>
</div>
</div>
<div class="clear"></div>
<div class="data_wrap">

<div style="margin-top:20px;float:left">
<span style="width: 134px; display: block;float: left;padding-top: 5px;">Работает в категориях</span>

<select id="ms" class="a_select cat" name="52[]" style="width:210px;" multiple>
'.$services_options.'
</select>
</div>
<div style="margin-top:20px;margin-left:5px;float:left">
<span style="width: 85px; display: block;float: left;padding-top: 5px;">Опыт работы</span>

<select class="a_select work" name="14" style="width:110px;margin-left: 2px;">
'.$work_options.'
</select>
</div>
<div class="clear"></div>
<div class="city_bl">
<span >Место проживания</span>
<input type="text" name="10" value="'.$city.'" />
</div>
<div class="city_bl">
<span>Номер WhatsApp</span>
<input type="text" name="48" value="'.$w_sap.'"/>
</div>
<div class="city_bl">
<span>Имя в Skype</span>
<input type="text" name="44" value="'.$skype.'"/>
</div>
<div class="city_bl">
<span>Instagram</span>
<input type="text" name="41" value="'.$instagram.'"/>
</div>
<div class="city_bl">
<span>VK</span>
<input type="text" name="42" value="'.$vk.'"/>
</div>
<div class="city_bl">
<span>Facebook</span>
<input type="text" name="43" value="'.$facebook.'"/>
</div>
<div class="city_bl">
<span>Ссылка
на портфолио</span>
<input type="text" name="28" value="'.$portf.'"/>
</div>
<div class="city_bl">
<span>О Себе</span>
<textarea rows="2" cols="36" name="30" >'.$content.'</textarea>
</div>

</div>
</div>
</section>

'.$showid.'

<div style="text-align:center;margin:30px auto;width:630px;">
<div class="bott_but">
 <input type="reset" value="Очистить форму">
 </div>
 <div style="width:280px;*display: inline !important;display: inline-block;">
 <input id="upload" class="add-button" type="submit" name="sub" value="Сохранить" />
 </div>
 <div class="bott_but">
 <a href="[[~292]]" target="_blank" >Новая анкета</a>
 </div>
</div>
</div>

</form>

'
;
print $result;