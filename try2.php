<div id="div_001">
<form id="form_001">
   <input type="button" id="button_001_id" name="button_001_Name" value="单击查看"
      class="button_001_Class" onclick="Get_srcElement(this)">
</form>
</div>

<script>
function Get_srcElement()
{
var srcElement=""
srcElement += "\n" + "event.srcElement.id : " + event.srcElement.id;
srcElement += "\n" + "event.srcElement.tagName : " + event.srcElement.tagName;
srcElement += "\n" + "event.srcElement.type : " + event.srcElement.type;
srcElement += "\n" + "event.srcElement.value : " + event.srcElement.value;
srcElement += "\n" + "event.srcElement.name : " + event.srcElement.name;
srcElement += "\n" + "event.srcElement.className : " + event.srcElement.className;
srcElement += "\n" + "event.srcElement.parentElement.id : " + event.srcElement.parentElement.id;
srcElement += "\n" + "event.srcElement.parentNode.id : " + event.srcElement.parentNode.id;
srcElement += "\n" + "event.srcElement.getattribute : " + event.srcElement.getAttribute;
alert(srcElement)
}
</script>