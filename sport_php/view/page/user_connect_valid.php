<?php
include VIEW_DIR."/static/header.html";
echo "<body>";
echo "<div>";
echo "<form action=\"/update\" method=\"post\">";
echo "<input type=\"text\" id=\"email\" name=\"email\" placeholder=\"email\" value=\"".$data['email']."\" required>";
echo "<input type=\"text\" id=\"password\" name=\"password\" placeholder=\"password\" value=\"".$data['password']."\" required>";
echo "</div>";
echo "<div>";
echo "<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Your name\" value=\"".$data['name']."\" required>";
echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" placeholder=\"Your lastname\" value=\"".$data['lastname']."\" required>";
echo "<input type=\"date\" id=\"birthday\" name=\"birthday\" min=\"1900/01/01\" max=\"2022/12/31\" value=\"".$data['birthday']."\" required>";
echo "</div>";
echo "<div>";
echo "<input type=\"text\" id=\"height\" name=\"height\" placeholder=\"Your height\" value=\"".$data['height']."\" required>";
echo "<input type=\"text\" id=\"weight\" name=\"weight\" placeholder=\"Your weight\" value=\"".$data['weight']."\" required>";
echo "<select name=\"sex\" id=\"sex\" required>";
echo "<option selected=\"selected\" value=\"".$data['sex']."\">".$data['sex']."</option>";
echo "<option value=\"♂\">♂</option>";
echo "<option value=\"♀\">♀</option>";
echo "<option value=\"?\">?</option>";
echo "</select>";
echo "</div>";
echo "<div>";
echo "<button type=\"submit\"><span>update</span></button>";
echo "</form>";
echo "<form action=\"/disconnect\" method=\"post\">";
echo "<button type=\"submit\"><span>logout</span></button>";
echo "</form>";
echo "<form action=\"/upload\" method=\"get\">";
echo "<button type=\"submit\"><span>upload</span></button>";
echo "</form>";
echo "<form action=\"/activities\" method=\"get\">";
echo "<button type=\"submit\"><span>acrtivities</span></button>";
echo "</form>";
echo "</div>";
echo "</body>";
include VIEW_DIR."/static/footer.html";
?>