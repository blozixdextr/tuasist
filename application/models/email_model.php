<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    { 
        parent::__construct();
    }
function Registration ($param1 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;"><strong>Hello '.$param1['full_name'].'</strong>
      
        <p align="center"><strong>Thanks for registering with</strong> Jobrabbit</p>

        <blockquote>
          <strong>Here are some ways we can help:</strong>
          <ul>
          		<li>post a job</li>
                <li>Become a jobrabbit</li>
                <li>Get quality candidtes</li>
          </ul>
          <blockquote>
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['emailid'],'Regsisted Successfully',$msg);
}

function forgot_password ($param1 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;"><strong>Forgot Password</strong>
      	<p align="center"><b>Email Id</b/> '.$param1['email'].'</p>
        <p align="center"><b>Password</b/> '.$param1['password'].'</p>		
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['email'],'Forgot Password',$msg);
}

function paypal_success ($param1 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;"><strong>Paypal Transaction Details</strong>
		<table>
		<tr><td><b>Job Id</b>'.$param1['job_id'].'</td><td><b>Job Name</b>'.$param1['job_name'].'</td></tr>
		<tr><td><b>Transaction ID </b></td><td>'.$param1['job_id'].'</td></tr>
		<tr><td><b>Status </b></td><td>'.$param1['status'].'</td></tr>
		<tr><td><b>Amount</b></td><td>'.$param1['amount'].'</td></tr>
		<tr><td><b>Payment Timestamp</b></td><td>'.$param1['payment_timestamp'].'</td></tr>
		<tr><td><b>Payment Method </b></td><td>'.$param1['payment_method'].'</td></tr>
		</table>
      	
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['email'],'Paypal Status',$msg);
}

function job_complete ($param1 = '',$param2 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;"><strong>Job Details</strong>
		<table>
		<tr><td><b>Job Id</b> '.$param2['job_id'].'</td><td><b>Job Name</b> '.$param2['jobname'].'</td></tr>
		<tr><td><b>Complete Amount</b> </td><td>'.$param1['jcomplete_amt'].'</td></tr>
		<tr><td><b>Feedback </b> </td><td>'.$param1['jfeedback'].'</td></tr>
		</table>
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param2['emailid'],'Job Complete',$msg);
}

function job_reject ($param1 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;">
      <strong>Job Name</strong>
		'.$param1['jname'].'
		<P>worker is reject this job</p>
      <p>Rejected Date :<b>'.date('Y-m-d').'</b></p>
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['tomail'],'Job Rejected',$msg);
}
function job_accept ($param1 = ''){
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;">
      <strong>Job Name</strong>
    '.$param1['jname'].'
    <P>worker is reject this job</p>
      <p>Accepted Date :<b>'.date('Y-m-d').'</b></p>
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['tomail'],'Job Accepted',$msg);
}
function notification ($param1 = ''){
  $fullpath = base_url();
  $fullpath .= 'home/login';
$msg ='<html>
<body>
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h1 style="color:#06F;">Jobrabbit</h1></td>
  </tr>
  <tr>
    <td align="center" background=""><table width="85%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td style="line-height:1.75; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666; font-style:300;">
      <strong>Hi</strong>
    '.$param1['full_name'].'
    <P>There is a work in your area, for more information</p>
    <p>Click here to <a href="'.$fullpath.'">login</a></p>
 </td>
      </tr>
     
    </table></td>
  </tr>

</table>
</body>
</html>';
$this->sent_mail('info@jobrabbit.info',$param1['emailid'],'Job Notification',$msg);
}

function sent_mail($form,$to,$subject,$msg){
	$html_code =$msg;
$mg_api = $this->db->get_where('sitesettings' , array('type'=>'mailgun_apikey'))->row()->description;
$mg_version = $this->db->get_where('sitesettings' , array('type'=>'mailgun_version'))->row()->description;
$mg_domain = $this->db->get_where('sitesettings' , array('type'=>'mailgun_domain'))->row()->description;
$mg_from_email = $this->db->get_where('sitesettings' , array('type'=>'mailgun_fromemail'))->row()->description;
$mg_reply_to_email = $this->db->get_where('sitesettings' , array('type'=>'mailgun_replyemail'))->row()->description;

$mg_message_url = "https://".$mg_version.$mg_domain."/messages";


$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_VERBOSE, 0);
curl_setopt ($ch, CURLOPT_HEADER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POST, true); 
//curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
curl_setopt($ch, CURLOPT_HEADER, false); 

//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_URL, $mg_message_url);
curl_setopt($ch, CURLOPT_POSTFIELDS,                
        array(  'from'      => $form,
                'to'        => $to,
                'h:Reply-To'=>  $form,
                'subject'   => $subject,
                'html'      =>$html_code ,
            ));
$result = curl_exec($ch);
curl_close($ch);
$res = json_decode($result,TRUE);
//print_r($res);

	}

	
}
