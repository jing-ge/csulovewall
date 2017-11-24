<?php 
/**
 * 安全过滤函数xss
 *
 * @param $string
 * @return string
 */
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}
//sql
function quotes($content)
{
    //if $content is an array
    if (is_array($content))
    {
        foreach ($content as $key=>$value)
        {
            //$content[$key] = mysql_real_escape_string($value);
            /*addslashes() 函数返回在预定义字符之前添加反斜杠的字符串。
            预定义字符是：
            单引号（'）
            双引号（"）
            反斜杠（\）
            NULL */
            $content[$key] = addslashes($value);
        }
    } else
    {
        //if $content is not an array
        //$content=mysql_real_escape_string($content);
        $content=addslashes($content);
    }
    return $content;
}
//过滤sql注入
function filter_injection(&$request)
{
    $pattern = "/(select[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])/i";
    foreach($request as $k=>$v)
    {
                if(preg_match($pattern,$k,$match))
                {
                        die("SQL Injection denied!");
                }

                if(is_array($v))
                {
                    filter_injection($request[$k]);
                }
                else
                {
                    if(preg_match($pattern,$v,$match))
                    {
                        die("SQL Injection denied!");
                    }
                }
    }

}
//处理时间
function dealtime($time)
{
	$cha=time()-$time;
	if ($cha<60) {
		return $cha."秒以前";
	}elseif ($cha<3600) {
		return round($cha/60)."分钟以前";
	}elseif ($cha<86400) {
		return round($cha/3600)."小时以前";
	}else{
		return date("Y年m月d日 H:i:s",$time);
	}
}
 ?>