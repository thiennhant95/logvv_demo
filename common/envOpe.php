<?php
/***********************************************************************************************************
 Environment variable Class library,PC not suport

 2005/06/01 Author:K.C
***********************************************************************************************************/

############################################################################################################
#
# User agent info check class UA_Info("HTTP_USER_AGENT");
# *The parameter can be omitted.($_SERVER['HTTP_USER_AGENT'])
#
############################################################################################################
class UA_Info{

# HTTP_USER_AGENT
var $ua;

// Constructor
function UA_Info($ev = ""){
	$this->ua = (empty($ev))?$_SERVER['HTTP_USER_AGENT']:$ev;
}

#------------------------------------------------------------------------------------------------
# Method of judging use OS/browser
#
#	Method:getNavInfo()
#	Argument:Null (Information that the constructor sets is used. )
#	Return value:Result information is returned by the array. 
#	
#	*Array value
#		0:Check The main browser(bool) *WinIE5or6 MacIE5/NN6〜7/Gecko/Opera6to7/Safari
#		1:UA information (String)
#		2:OS name (String)
#		3:OS Version (String)
#		4:Bowser name (String)
#		5:Bowser Version (String)
#		6:UA is stored by processing the character string
#		7:OS ID
#			[1] = Windows;
#			[2] = Macintosh;
#			[3] = Linux;
#			[4] = Multimedia Apparatus(DreamPassport);
#			[5] = Other Multimedia Apparatus;
#			[6] = Unknown;
#		8:Bowser ID
#			[1] = Internet Explorer;
#			[2] = Netscape;
#			[3] = Mozilla or Firefox;
#			[4] = Opera;
#			[5] = iCab;
#			[6] = Safari;
#			[7] = Multimedia Apparatus;
#			[8] = Other Multimedia Apparatus;
#			[9] = Unknown;
#
#------------------------------------------------------------------------------------------------
function getNavInfo(){

	///////////////////////////////////////////
	// Array of the result storage is initialized. 
	$result[0] = false;
	$result[1] = "";
	$result[2] = "";
	$result[3] = "";
	$result[4] = "";
	$result[5] = "";
	$result[6] = "";
	$result[7] = "";
	$result[8] = "";

	///////////////////////////////////////////
	// String manipulation(Dangerous character)anonymous function
	$strSyori = create_function('$str','strip_tags($str);htmlspecialchars($str);'.str_replace(array("\t","/etc/passwd","sendmail","\\","|"),"",'$str').';return $str;');


	///////////////////////////////////////////
	// Windows95 (OS ID is [1])
	if(stristr($this->ua,"MSIE 4.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 95")&&!stristr($this->ua,"Opera")){
		$result[1] = "Windows95 IE4.0";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Internet Explorer";
		$result[5] = "4.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 95")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 IE5.0";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Internet Explorer";
		$result[5] = "5.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.5;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 95")&& !stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 IE5.5";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Internet Explorer";
		$result[5] = "5.5";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 6.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 95")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 IE6.0";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Internet Explorer";
		$result[5] = "6.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"Netscape6")&&stristr($this->ua,"Win95")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 NN6.x";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"Win95")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 NN7.x";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"Win95")&&!stristr($this->ua,"Netscape/7")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows95 Mozilla.org";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "1";
		$result[8] = "3";
	}
	elseif((stristr($this->ua,"Opera 6")||stristr($this->ua,"Opera/6"))&&stristr($this->ua,"Windows 95")){
		$result[0] = true;
		$result[1] = "Windows95 Opera6.x";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Opera";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "4";
	}
	elseif((stristr($this->ua,"Opera 7")||stristr($this->ua,"Opera/7"))&&stristr($this->ua,"Windows 95")){
		$result[0] = true;
		$result[1] = "Windows95 Opera7.x";
		$result[2] = "Windows";
		$result[3] = "95";
		$result[4] = "Opera";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "4";
	}


	///////////////////////////////////////////
	// Windows98 (OS ID is [1])
	elseif(stristr($this->ua,"MSIE 4.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[1] = "Windows98 IE4.0";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Internet Explorer";
		$result[5] = "4.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 IE5.0";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Internet Explorer";
		$result[5] = "5.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.5;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 IE5.5";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Internet Explorer";
		$result[5] = "5.5";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 6.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 IE6.0";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Internet Explorer";
		$result[5] = "6.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(!stristr($this->ua,"compatible;")&&stristr($this->ua,"Mozilla/4.")&&stristr($this->ua,"Win98")&&!stristr($this->ua,"Opera")){
		$result[1] = "Windows98 NN4.x";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Netscape";
		$result[5] = "4.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape6")&&stristr($this->ua,"Win98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 NN6.x";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"Win98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 NN7.x";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"Win98")&&!stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Netscape/7")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows98 Mozilla.org";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "1";
		$result[8] = "3";
	}
	elseif((stristr($this->ua,"Opera 6")||stristr($this->ua,"Opera/6"))&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")){
		$result[0] = true;
		$result[1] = "Windows98 Opera6.x";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Opera";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "4";
	}
	elseif((stristr($this->ua,"Opera 7")||stristr($this->ua,"Opera/7"))&&stristr($this->ua,"Windows 98")&&!stristr($this->ua,"Win 9x")){
		$result[0] = true;
		$result[1] = "Windows98 Opera7.x";
		$result[2] = "Windows";
		$result[3] = "98";
		$result[4] = "Opera";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "4";
	}


	///////////////////////////////////////////
	// WindowsMe (OS ID is [1])
	elseif(stristr($this->ua,"MSIE 5.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98; Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe IE5.0";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Internet Explorer";
		$result[5] = "5.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.5;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98; Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe IE5.5";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Internet Explorer";
		$result[5] = "5.5";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 6.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows 98; Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe IE6.0";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Internet Explorer";
		$result[5] = "6.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(!stristr($this->ua,"compatible;")&&stristr($this->ua,"Mozilla/4.")&&stristr($this->ua,"Win95")&&!stristr($this->ua,"Opera")){
		$result[1] = "WindowsMe or 95 NN4.x";
		$result[2] = "Windows";
		$result[3] = "Me or 95";
		$result[4] = "Netscape";
		$result[5] = "4.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape6")&&stristr($this->ua,"Win 9x")&& !stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe NN6.x";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe NN7.x";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"Win 9x")&&!stristr($this->ua,"Netscape/7")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsMe Mozilla.org";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "1";
		$result[8] = "3";
	}
	elseif((stristr($this->ua,"Opera 6")||stristr($this->ua,"Opera/6"))&&stristr($this->ua,"Windows ME")){
		$result[0] = true;
		$result[1] = "WindowsMe Opera6.x";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Opera";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "4";
	}
	elseif((stristr($this->ua,"Opera 7")||stristr($this->ua,"Opera/7"))&&stristr($this->ua,"Windows ME")){
		$result[0] = true;
		$result[1] = "WindowsMe Opera7.x";
		$result[2] = "Windows";
		$result[3] = "Me";
		$result[4] = "Opera";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "4";
	}


	///////////////////////////////////////////	
	// Windows 2000 (OS ID is [1])
	elseif(stristr($this->ua,"MSIE 5.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.0")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 IE5.0";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Internet Explorer";
		$result[5] = "5.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.5;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.0")&& !stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 IE5.5";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Internet Explorer";
		$result[5] = "5.5";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 6.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.0")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 IE6.0";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Internet Explorer";
		$result[5] = "6.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(!stristr($this->ua,"compatible;")&&stristr($this->ua,"Mozilla/4.")&&(stristr($this->ua,"WinNT;")||stristr($this->ua,"Windows NT 5.0"))&&!stristr($this->ua,"Opera")){
		$result[1] = "Windows2000 or XP NN4.x";
		$result[2] = "Windows";
		$result[3] = "2000 or XP";
		$result[4] = "Netscape";
		$result[5] = "4.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape6")&&stristr($this->ua,"NT 5.0")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 NN6.x";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"NT 5.0")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 NN7.x";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"NT 5.0")&&!stristr($this->ua,"Netscape/7")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "Windows2000 Mozilla.org";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "1";
		$result[8] = "3";
	}
	elseif(stristr($this->ua,"Opera 6")||stristr($this->ua,"Opera/6")&&stristr($this->ua,"Windows 2000")){
		$result[0] = true;
		$result[1] = "Windows2000 Opera6.x";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Opera";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "4";
	}
	elseif(stristr($this->ua,"Opera 7")||stristr($this->ua,"Opera/7")&&stristr($this->ua,"NT 5.0")){
		$result[0] = true;
		$result[1] = "Windows2000 Opera7.x";
		$result[2] = "Windows";
		$result[3] = "2000";
		$result[4] = "Opera";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "4";
	}


	///////////////////////////////////////////	
	// Windows XP (OS ID is [1])
	elseif(stristr($this->ua,"MSIE 5.0")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.1")&&stristr($this->ua,"Windows NT 5.1")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP IE5.0";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Internet Explorer";
		$result[5] = "5.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.5;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.1")&& !stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP IE5.5";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Internet Explorer";
		$result[5] = "5.5";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 6.0;")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Windows NT 5.1")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP IE6.0";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Internet Explorer";
		$result[5] = "6.0";
		$result[7] = "1";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"Netscape6")&&stristr($this->ua,"NT 5.1")&& !stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP NN6.x";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"NT 5.1")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP NN7.x";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"NT 5.1")&&!stristr($this->ua,"Netscape/7")&&!stristr($this->ua,"Opera")){
		$result[0] = true;
		$result[1] = "WindowsXP Mozilla.org";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "1";
		$result[8] = "3";
	}
	elseif((stristr($this->ua,"Opera 6")||stristr($this->ua,"Opera/6"))&&stristr($this->ua,"Windows NT 5.1;")){
		$result[0] = true;
		$result[1] = "WindowsXP Opera6.x";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Opera";
		$result[5] = "6.x";
		$result[7] = "1";
		$result[8] = "4";
	}
	elseif((stristr($this->ua,"Opera 7")||stristr($this->ua,"Opera/7"))&&stristr($this->ua,"Windows NT 5.1;")){
		$result[0] = true;
		$result[1] = "WindowsXP Opera7.x";
		$result[2] = "Windows";
		$result[3] = "XP";
		$result[4] = "Opera";
		$result[5] = "7.x";
		$result[7] = "1";
		$result[8] = "4";
	}


	///////////////////////////////////////////	
	// MacClassic (OS ID is [2])
	elseif(stristr($this->ua,"MSIE 4.5")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Mac_PowerPC")){
		$result[1] = "Macintosh PPC MSIE 4.5";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Internet Explorer";
		$result[5] = "4.5";
		$result[7] = "2";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"MSIE 5.")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Mac_PowerPC")){
		$result[0] = true;
		$result[1] = "Macintosh PPC MSIE 5.x";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Internet Explorer";
		$result[5] = "5.x";
		$result[7] = "2";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"Mozilla/4.")&&stristr($this->ua,"PPC")&&stristr($this->ua,"Macintosh")){
		$result[1] = "Macintosh PPC NN4.x";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Netscape";
		$result[5] = "4.x";
		$result[7] = "2";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape6/")&&stristr($this->ua,"Macintosh")&&!stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh PPC NN6.x";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "2";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&&stristr($this->ua,"Macintosh")&&!stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh PPC NN7.x";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "2";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/")&&stristr($this->ua,"Macintosh")&&!stristr($this->ua,"Netscape")&&!stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh PPC Mozilla.org";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "3";
	}
	elseif(stristr($this->ua,"Opera")&&stristr($this->ua,"Mac_PowerPC")){
		$result[0] = true;
		$result[1] = "Macintosh PPC Opera";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "Opera";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "4";
	}
	elseif(stristr($this->ua,"iCab")&&stristr($this->ua,"Macintosh")&&stristr($this->ua,"PPC")&&!stristr($this->ua,"Mac OS X")){
		$result[1] = "Macintosh PPC iCab";
		$result[2] = "Macintosh";
		$result[3] = "PPC";
		$result[4] = "iCab";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "5";
	}


	///////////////////////////////////////////	
	// MacOS X (OS ID is [2])
	elseif(stristr($this->ua,"MSIE 5.2")&&stristr($this->ua,"compatible;")&&stristr($this->ua,"Mac_PowerPC")){
		$result[0] = true;
		$result[1] = "Macintosh OS X MSIE 5.2x";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Internet Explorer";
		$result[5] = "5.2x";
		$result[7] = "2";
		$result[8] = "1";
	}
	elseif(stristr($this->ua,"Netscape6/")&& stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh OS X NN6.x";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Netscape";
		$result[5] = "6.x";
		$result[7] = "2";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Netscape/7")&& stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh OS X NN7.x";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Netscape";
		$result[5] = "7.x";
		$result[7] = "2";
		$result[8] = "2";
	}
	elseif(stristr($this->ua,"Gecko/") && stristr($this->ua,"Mac OS X") && !stristr($this->ua,"Netscape")){
		$result[0] = true;
		$result[1] = "Macintosh OS X Mozilla.org";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Mozilla or Firefox";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "3";
	}
	elseif(stristr($this->ua,"Opera")&&stristr($this->ua,"Mac OS X")){
		$result[0] = true;
		$result[1] = "Macintosh OS X Opera";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Opera";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "4";
	}
	elseif(stristr($this->ua,"Mac OS X")&&stristr($this->ua,"Safari")){
		$result[0] = true;
		$result[1] = "Macintosh OS X Safari";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "Safari";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "6";
	}
	elseif(stristr($this->ua,"iCab")&&stristr($this->ua,"OS X")&&!stristr($this->ua,"68")){
		$result[1] = "Macintosh OS X iCab";
		$result[2] = "Macintosh";
		$result[3] = "OS X";
		$result[4] = "iCab";
		$result[5] = "Unknown";
		$result[7] = "2";
		$result[8] = "5";
	}


	///////////////////////////////////////////////////////	
	// UnixOS(and Linux) *Storage $result[6] to UA (OS ID is [3])
	elseif(stristr($this->ua,"Linux") || stristr($this->ua,"SunOS") || stristr($this->ua,"BSD")){
		$result[1] = "UNIX OS";
		$result[2] = "Linux";
		$result[3] = "Unknown";
		$result[4] = "Unknown";
		$result[5] = "Unknown";
		$result[7] = "3";
		$result[8] = "9";
	}


	//////////////////////////////////////////////////////////	
	// An ohter game player	*Storage $result[6] to UA (OS ID is [4])
	elseif(stristr($this->ua,"Mozilla/3.0 (DreamPassport/3.")){
		$result[1] = "Multimedia Apparatus(DreamPassport)";
		$result[2] = "Multimedia Apparatus(DreamPassport)";
		$result[3] = "Multimedia Apparatus(DreamPassport)";
		$result[4] = "Multimedia Apparatus(DreamPassport)";
		$result[5] = "Unknown";
		$result[7] = "4";
		$result[8] = "7";
	}
	elseif(stristr($this->ua,"Mozilla/3.0")&&(stristr($this->ua,"BrowserInfo")||stristr($this->ua,"Screen=")||stristr($this->ua,"InputMethod=")||stristr($this->ua,"Product="))){
		$result[1] = "Other Multimedia Apparatus";
		$result[2] = "Other Multimedia Apparatus";
		$result[3] = "Other Multimedia Apparatus";
		$result[4] = "Other Multimedia Apparatus";
		$result[5] = "Unknown";
		$result[7] = "5";
		$result[8] = "8";	
	}
	
	
	///////////////////////////////////////////////////////////////////////////////
	// An other Uncertainty *Storage $result[6] to UA (OS ID is [5])
	else{

		// WindowsOS(An other Bowser)
		if(stristr($this->ua,"Sleipnir")||stristr($this->ua,"MSIE")||stristr($this->ua,"Win")||stristr($this->ua,"Cuam")||stristr($this->ua,"compatible;")){	
			$result[1] = "Windows IE";
			$result[2] = "Windows";
			$result[3] = "Unknown";
			$result[4] = "Internet Explorer";
			$result[5] = "Unknown";
			$result[7] = "1";
			$result[8] = "1";
		}
		else{
			// Small number of people or environment variable counterfeit
			$result[1] = "Unknown";
			$result[2] = "Unknown";
			$result[3] = "Unknown";
			$result[4] = "Unknown";
			$result[5] = "Unknown";
			$result[7] = "6";
			$result[8] = "9";
		}
	
	}


	///////////////////////////////////////////////////////////////////////////
	// Former data that processed character string at the end,$result[6]stored and the judgment result is returned.
	$result[6] = $strSyori($this->ua);
	return $result;


/* Method"getNavInfo"end */	
}






} /* Class"UA_Info"end */

############################################################################################################
#
# Environment variable file export/Investigation class 	ENV_Info("Stored by the array environment variable");
# * The parameter can be omitted.
#
############################################################################################################

class ENV_Info{


var $env;	# ENV

// Constructor
function ENV_Info($ev = array()){

	if(empty($ev)):
		$this->env[0] = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
		$this->env[1] = $_SERVER["HTTP_USER_AGENT"];
		$this->env[2] = $_SERVER["HTTP_REFERER"];
	else:
		foreach($ev as $e)$this->env[] = $e; 
	endif;
	
}

#--------------------------------------------------------------------------------------------------------
# Method of storing environment variable in extraction file
#
#	Method:fileOutput
#	Argument: 1)Indispensability 2)Make file name 3)true = Acquires/false or Null= Doesn't acquire 
#	Return value:Null
#
#	Note1:Have not file path set to erro and set to end.
#	Note2:Illegal environment variable measures Rep()
#---------------------------------------------------------------------------------------------------------
function fileOutput($path,$file_name = "",$getProxy = false){

	if(!$path)die("ファイルパスが未指定です！ ※fileOutput実行時");

	/// File name default with date
	$getFileName = (empty($file_name))?date("Ymd").".dat":$file_name;

	// Set file name and path
	$ualogfile = $path;
	if(!ereg($path,"./$"))$ualogfile .= "/";
	$ualogfile .= $getFileName;

	$pxy = "";
	if($getProxy):

		if($_ENV['HTTP_VIA'])$pxy .= "HTTP_VIA:".$_ENV['HTTP_VIA']."\t";
		if($_ENV['HTTP_FORWARDED'])$pxy .= "HTTP_FORWARDED:".$_ENV['HTTP_FORWARDED']."\t";
		if($_ENV['HTTP_X_FORWARDED_FOR'])$pxy .= "HTTP_X_FORWARDED_FOR:".$_ENV['HTTP_X_FORWARDED_FOR']."\t";
		if($_ENV['HTTP_CACHE_INFO'])$pxy .= "HTTP_CACHE_INFO:".$_ENV['HTTP_CACHE_INFO']."\t";
		if($_ENV['HTTP_XONNECTION'])$pxy .= "HTTP_XONNECTION:".$_ENV['HTTP_XONNECTION']."\t";
		if($_ENV['HTTP_SP_HOST'])$pxy .= "HTTP_SP_HOST:".$_ENV['HTTP_SP_HOST']."\t";
		if($_ENV['HTTP_FROM'])$pxy .= "HTTP_FROM:".$_ENV['HTTP_FROM']."\t";
		if($_ENV['HTTP_X_LOCKING'])$pxy .= "HTTP_X_LOCKING:".$_ENV['HTTP_X_LOCKING']."\t";
		if($_ENV['HTTP_PROXY_CONNECTION'])$pxy .= "HTTP_PROXY_CONNECTION:".$_ENV['HTTP_PROXY_CONNECTION']."\t";

	endif;

	
	/////////////////////////////////////////////////////////////////////////////
	// Character string substitution and NG word check,and write to file

	// NG word
	$ng_word = array("\t","/etc/passwd","sendmail","\\","|");

	// Character string substitution and NG word check
	foreach($this->env as $e){
		if(!empty($e)):
			strip_tags($e);
			ereg_replace("^[[:space:]]{0,}","",$e);
			ereg_replace("[[:space:]]{0,}$","",$e);
			mb_ereg_replace("^(　){0,}","",$e);
			mb_ereg_replace("(　){0,}$","",$e);
			trim($e);
			htmlspecialchars($e);
			if(get_magic_quotes_gpc())stripslashes($e);
			str_replace($ng_word,"",$e);
		endif;
	}
	
	// Unifies it(present date in the head)
	$env_data = date("Y.m.d H:i:s")."\t";
	for($i=0;$i<count($this->env);$i++){
		$env_data .= $this->env[$i];
		if($i != (count($this->env)-1))$env_data .= "\t";
	}
	if(!empty($pxy))$env_data .= "\t".$pxy;

	// File writing(Write-once type)
	$FP = @fopen($ualogfile,"a");
	@flock($FP,LOCK_EX);
	@fwrite($FP,$env_data);
	@fwrite($FP,"\n");
	@flock($FP,LOCK_UN);
	@fclose($FP);

}  /* Method"fileOutput"end */



} /* Class"ENV_Info"end */

?>