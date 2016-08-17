<?php
namespace Home\Controller;
use Think\Controller;

class PayController extends Controller {
      //�����ʼ�������У�����������    
       public function _initialize() {
        vendor('Alipay.Corefunction');
        vendor('Alipay.Md5function');
        vendor('Alipay.Notify');
        vendor('Alipay.Submit');
     
    }
    
    //doalipay����
        /*�÷�����ʵ���ǽ��ӿ��ļ�����alipayapi.php�����ݸ��ƹ���
          Ȼ�������ش���
        */
    public function doalipay(){
        
       /*********************************************************
            ��alipayapi.php�и��ƹ������������δ���ȥ����
            ��һ�������������
            �ڶ���������submit.class.php����ࡣ
           ΪʲôҪȥ������
            ��һ��������������Ѿ�����Ŀ��Config.php�ļ��н��������ã�����ֻ����C�������е��ü��ɣ�
            �ڶ���������õ�submit.class.php��������Ѿ���PayAction��_initialize()���Ѿ����룻�������ﲻ����Ҫ��
            *****************************************************/
       // require_once("alipay.config.php");
       // require_once("lib/alipay_submit.class.php");
       
       //��������ͨ��TP��C�������������������������$alipay_config��
       $alipay_config=C('alipay_config');  
 
        /**************************�������**************************/
        $payment_type = "1"; //֧������ //��������޸�
        $notify_url = C('alipay.notify_url'); //�������첽֪ͨҳ��·��
        $return_url = C('alipay.return_url'); //ҳ����תͬ��֪ͨҳ��·��
        $seller_email = C('alipay.seller_email');//����֧�����ʻ�����
        $out_trade_no = $_POST['trade_no'];//�̻������� ͨ��֧��ҳ��ı����д��ݣ�ע��ҪΨһ��
        $subject = $_POST['ordsubject'];  //�������� //���� ͨ��֧��ҳ��ı����д���
        $total_fee = $_POST['ordtotal_fee'];   //������  //���� ͨ��֧��ҳ��ı����д���
        $body = $_POST['ordbody'];  //�������� ͨ��֧��ҳ��ı����д���
        $show_url = $_POST['ordshow_url'];  //��Ʒչʾ��ַ ͨ��֧��ҳ��ı����д���
        $anti_phishing_key = "";//������ʱ��� //��Ҫʹ����������ļ�submit�е�query_timestamp����
        $exter_invoke_ip = get_client_ip(); //�ͻ��˵�IP��ַ 
        /************************************************************/
    
			//����Ҫ����Ĳ������飬����Ķ�
		$parameter = array(
			"service" => "create_direct_pay_by_user",
			"partner" => trim($alipay_config['partner']),
			"payment_type"    => $payment_type,
			"notify_url"    => $notify_url,
			"return_url"    => $return_url,
			"seller_email"    => $seller_email,
			"out_trade_no"    => $out_trade_no,
			"subject"    => $subject,
			"total_fee"    => $total_fee,
			"body"            => $body,
			"show_url"    => $show_url,
			"anti_phishing_key"    => $anti_phishing_key,
			"exter_invoke_ip"    => $exter_invoke_ip,
			"_input_charset"    => trim(strtolower($alipay_config['input_charset']))
			);
			//��������
			$alipaySubmit = new \AlipaySubmit($alipay_config);
			$html_text = $alipaySubmit->buildRequestForm($parameter,"post", "ȷ��");
			echo $html_text;
	}
    
        /******************************
        �������첽֪ͨҳ�淽��
        ��ʵ������ǽ�notify_url.php�ļ��еĴ��븴�ƹ������д���
        
        *******************************/
    public function notifyurl(){
        /*
        ͬ��ȥ������������룻
        */ 
		//require_once("alipay.config.php");
		//require_once("lib/alipay_notify.class.php");
		
		//���ﻹ��ͨ��C��������ȡ�������ֵ��$alipay_config
        $alipay_config=C('alipay_config');
        //����ó�֪ͨ��֤���
        $alipayNotify = new  \  AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if($verify_result) {
            //��֤�ɹ�
            //��ȡ֧������֪ͨ���ز������ɲο������ĵ��з������첽֪ͨ�����б�
			$out_trade_no   = $_POST['out_trade_no'];      //�̻�������
			$trade_no       = $_POST['trade_no'];          //֧�������׺�
			$trade_status   = $_POST['trade_status'];      //����״̬
			$total_fee      = $_POST['total_fee'];         //���׽��
			$notify_id      = $_POST['notify_id'];         //֪ͨУ��ID��
			$notify_time    = $_POST['notify_time'];       //֪ͨ�ķ���ʱ�䡣��ʽΪyyyy-MM-dd HH:mm:ss��
			$buyer_email    = $_POST['buyer_email'];       //���֧�����ʺţ�
            $parameter = array(
				"out_trade_no"     => $out_trade_no, //�̻�������ţ�
				"trade_no"     => $trade_no,     //֧�������׺ţ�
				"total_fee"     => $total_fee,    //���׽�
				"trade_status"     => $trade_status, //����״̬
				"notify_id"     => $notify_id,    //֪ͨУ��ID��
				"notify_time"   => $notify_time,  //֪ͨ�ķ���ʱ�䡣
				"buyer_email"   => $buyer_email,  //���֧�����ʺţ�
           );
           if($_POST['trade_status'] == 'TRADE_FINISHED') {
                       //
           }else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {                           
				if(!checkorderstatus($out_trade_no)){
					orderhandle($parameter); 
                    //���ж������������ʹ�֧�������صĲ�����
				}
            }
            echo "success";        //�벻Ҫ�޸Ļ�ɾ��
         }else {
            //��֤ʧ��
            echo "fail";
        }    
    }
    
    /*
    ҳ����ת��������
    ������ʵ���ǽ�return_url.php����ļ��еĴ��븴�ƹ��������д��� 
    */
    public function returnurl(){
        //ͷ���Ĵ����������������һ�������ﲻ�����ˣ�
        $alipay_config=C('alipay_config');
        $alipayNotify = new  \ AlipayNotify($alipay_config);//����ó�֪ͨ��֤���
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {
			//��֤�ɹ�
			//��ȡ֧������֪ͨ���ز������ɲο������ĵ���ҳ����תͬ��֪ͨ�����б�
			$out_trade_no   = $_GET['out_trade_no'];      //�̻�������
			$trade_no       = $_GET['trade_no'];          //֧�������׺�
			$trade_status   = $_GET['trade_status'];      //����״̬
			$total_fee      = $_GET['total_fee'];         //���׽��
			$notify_id      = $_GET['notify_id'];         //֪ͨУ��ID��
			$notify_time    = $_GET['notify_time'];       //֪ͨ�ķ���ʱ�䡣
			$buyer_email    = $_GET['buyer_email'];       //���֧�����ʺţ�
				
			$parameter = array(
				"out_trade_no"     => $out_trade_no,      //�̻�������ţ�
				"trade_no"     => $trade_no,          //֧�������׺ţ�
				"total_fee"      => $total_fee,         //���׽�
				"trade_status"     => $trade_status,      //����״̬
				"notify_id"      => $notify_id,         //֪ͨУ��ID��
				"notify_time"    => $notify_time,       //֪ͨ�ķ���ʱ�䡣
				"buyer_email"    => $buyer_email,       //���֧�����ʺ�
			);
        
			if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
				if(!checkorderstatus($out_trade_no)){
					orderhandle($parameter);  //���ж������������ʹ�֧�������صĲ�����
			}
			$this->redirect(C('alipay.successpage'));//��ת�������������õ�֧���ɹ�ҳ�棻
			}else {
				echo "trade_status=".$_GET['trade_status'];
				$this->redirect(C('alipay.errorpage'));//��ת�������������õ�֧��ʧ��ҳ�棻
			}
		}else {
			//��֤ʧ��
			//��Ҫ���ԣ��뿴alipay_notify.phpҳ���verifyReturn����
			echo "֧��ʧ�ܣ�";
		}
	}
 }
 ?>
     
     
     