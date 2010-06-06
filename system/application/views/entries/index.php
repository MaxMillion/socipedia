<style>
dl {
  margin-right: 200px;
}
dl dt {
  margin-top: 5px;
  font-weight: bold;
}
dl dt img {
  float: right;
}
.section {
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
  color: #999;
  border-top: dotted 1px #ccc;
}
.section A {
  color: #999;
}
#index {
  font-size: 14pt;
  font-weight: bold;
  margin-right: 200px;
  text-align: center;
}
.index_char {
margin: 0px 4px;
text-decoration: underline;
}
</style>

<div class="sidebar">
  <p>Get this search as a &hellip;</p>
  <a class="button" href="#">RSS Feed</a>
  <a class="button" href="#">CSV File</a>
  <a class="button" href="<?= $maplink ?>" target="_blank">Google Map</a>
</div>

<? $count = count($entries) ?>
<h2><?= $q ? "$count entries matching $q" : "All $count entries" ?></h2>
<div id="index">
<?
$chars = array();

foreach($entries as $entry) {
  $char = strtoupper(substr($entry->getDisplayName(), 0,1));
  $chars[] = $char;
}
sort($chars);
$chars = array_unique($chars);
foreach($chars as $char) {
  echo "<a class=\"index_char\" href=\"#section_$char\">$char</a>";
}
?>
</div>
<dl>
  <?
  $lastchar = "";
  foreach($entries as $entry) {
    $dn = $entry->getDisplayName();
    $char = strtoupper(substr($dn, 0,1));
    if ($char != $lastchar) {
      echo "<div class=\"section\"><a name=\"section_$char\">$char</a></div>";
    }
    $lastchar = $char;
  ?>
    <dt>
      <?
      if ($entry->has_image) {
        echo '<img src="'.$entry->thumbURL().'" />';
      }
      echo anchor('/entries/'.$entry->id, $dn);
      ?>
    </dt>
    <dd>
      <?= $entry->getDescription(200) ?>
    </dd>
    <? cleer() ?>
  <? } ?>
</dl>