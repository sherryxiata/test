<?php
namespace Home\Controller;
use Think\Controller;
class Lesson2Controller extends Controller {
    public function login(){
    	$this->display();
    }
	
	public function loginCheck(){
		$arr = I();
		$account = $arr['account'];
		$pwd = $arr['pwd'];
		if ($account == '' || $account == null) {
			$result['state'] = false;
			$result['info'] = '请输入手机号';
		} else if ($pwd == '' || $pwd == null) {
			$result['state'] = false;
			$result['info'] = '请输入密码';
		} else {
			$isExist = M('user_base_info') -> where(array('account' => $account)) -> find();
			if ($isExist) {
				if (md5($pwd) == $isExist['password']) {
					//保存平台端登录人的id
					session(C('ADMIN_SESSION'), $isExist['id']);
					$result['state'] = true;
				} else {
					$result['state'] = false;
					$result['info'] = '密码错误';
				}
			} else {
				$result['state'] = false;
				$result['info'] = '账号不存在';
			}
		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}