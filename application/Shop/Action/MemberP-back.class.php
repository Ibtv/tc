<?php

//会员产品处理页面,商城首页面

class MemberprodAction extends HomeBaseAction {



//以后整合到一个二维数组，现在不做优化；由靳思远（以后简称J_SY）开发2014-10.5

//前端模板输出头部没有放入Public内，待优化！



	public function index(){



		$mb = M('Approve');

		$nlmy = $mb -> where('htypeid=1') ->order("id desc")-> select();

		$ckzz = $mb -> where('htypeid=2') ->order("id desc")-> select();

		$drrq = $mb -> where('htypeid=3') ->order("id desc")-> select();

		$jzfc = $mb -> where('htypeid=4') ->order("id desc")-> select();

		$pfls = $mb -> where('htypeid=5') ->order("id desc")-> select();

		$rjxx = $mb -> where('htypeid=6') ->order("id desc")-> select();

		$wtyl = $mb -> where('htypeid=7') ->order("id desc")-> select();

		$gjzz = $mb -> where('htypeid=8') ->order("id desc")-> select();



		$listnlmy = $mb -> where('htypeid=1') -> limit(12) -> select();

		$listckzz = $mb -> where('htypeid=2') -> limit(12) -> select();

		$listdrrq = $mb -> where('htypeid=3') -> limit(12) -> select();

		$listjzfc = $mb -> where('htypeid=4') -> limit(12) -> select();

		$listpfls = $mb -> where('htypeid=5') -> limit(12) -> select();

		$listrjxx = $mb -> where('htypeid=6') -> limit(12) -> select();

		$listwtyl = $mb -> where('htypeid=7') -> limit(12) -> select();

		$listgjzz = $mb -> where('htypeid=8') -> limit(12) -> select();



		$newprolist = M("produce")->limit(4)->order('id desc')->select();

		$rehyelist = M("htypeid")->limit(6)->select();

		$tuiprolist = M("produce")->where('status=1')->order("id desc")->limit(2)->select();

		$zshiprolist = M("produce")->where('status=1')->order("id desc") ->limit(2,7)->select();

		$tuimember = $mb->where('tuij=1')->order("id desc")->limit(12)->select();

		$newmember = $mb->limit(7)->order('id desc')->select();

		$newmsg = M('message')->order('id desc')->limit(5)->select();

		$tuimsg = M('message')->where('status=1')->limit(6)->select();



		$wuflist = M("mbersimg")->order("id desc")->limit(5)->select();



		$this -> assign('nlmy',$nlmy);

		$this -> assign('ckzz',$ckzz);

		$this -> assign('drrq',$drrq);

		$this -> assign('jzfc',$jzfc);

		$this -> assign('pfls',$pfls);

		$this -> assign('rjxx',$rjxx);

		$this -> assign('wtyl',$wtyl);

		$this -> assign('gjzz',$gjzz);



		$this -> assign('listnlmy',$listnlmy);

		$this -> assign('listckzz',$listckzz);

		$this -> assign('listdrrq',$listdrrq);

		$this -> assign('listjzfc',$listjzfc);

		$this -> assign('listpfls',$listpfls);

		$this -> assign('listrjxx',$listrjxx);

		$this -> assign('listwtyl',$listwtyl);

		$this -> assign('listgjzz',$listgjzz);



		$this -> assign('prolist',$newprolist);

		$this -> assign('rehyelist',$rehyelist);

		$this -> assign('tuiprolist',$tuiprolist);

		$this -> assign('zshiprolist',$zshiprolist);

		$this -> assign('tuimember',$tuimember);

		$this -> assign('newmember',$newmember);

		$this -> assign('newmsg',$newmsg);

		$this -> assign('tuimsg',$tuimsg);

		$this -> assign('wuflist',$wuflist);

		$this -> display(":index");

	}



	public function member(){



		$mm = M('Approve');

		$allm = $mm->select();

		$tuimember = $mm->where("tuij=1")->select();

		$tuimessage=M("message")->where("status=1")->select();



		$this->assign('tuimessage',$tuimessage);

		$this->assign('allm',$allm);

		$this->assign('tuimember',$tuimember);

		$this->display(":member");

	}



	public function product(){



		$pro = M("produce");

		$allprod = $pro->select();

		$tuiprod = $pro -> where("status=1")->limit(6)->select();

		$tuimessage=M("message")->where("status=1")->select();



		$this->assign('tuimessage',$tuimessage);

		$this->assign('allprod',$allprod);

		$this->assign('tuiprod',$tuiprod);

		$this->display(":product");

	}



	public function memberinfo(){

		$id = $_GET['id'];

		$m = M("Approve");

		if($id){

		$mb = $m -> where("id=$id")->find();

		}elseif($_GET['mn']){

		$mn = $_GET['mn'];

		$mb = $m -> where("mname='$mn'") -> find();	

		}

		$mm = $mb['mid'];
		$mpro = M("produce")->where("mid='$mm'")->select();
		$tuimessage=M("message")->where("status=1")->select();

		$this->assign('tuimessage',$tuimessage);

		$this->assign('mb',$mb);

		$this->assign('mpro',$mpro);

		$this->display(":memberinfo");

	}



	public function productinfo(){

		$p = M("produce");
		$id = $_GET['id'];
		$pro = $p -> where("id=$id")->find();
		$tuiprod = $p -> where("status=1")-> limit(5) ->select();
		$mn = $pro['mname'];
		$mns = M("Approve")->where("mname='$mn'")->find();
		$tuimessage=M("message")->where("status=1")->select();

		$this->assign('tuimessage',$tuimessage);
		$this->assign('tuiprod',$tuiprod);

		$this->assign('pro',$pro);

		$this->assign('mns',$mns);

		$this->display(":productinfo");

	}



	public function activity(){

		$m = M("mbersimg");

		$hd = $m -> order("id desc")->select();

		$tuimessage=M("message")->where("status=1")->select();



		$this->assign('tuimessage',$tuimessage);

		$this->assign('hd',$hd);

		$this->display(":activity");

	}
 


	public function activityinfo(){

		$id = $_GET['id'];

		$m = M("mbersimg");

		$hd = $m -> where("id=$id")->find();

		$tuimessage=M("message")->where("status=1")->select();


		$latestnews = M("message")->order("id desc")->limit(6)->select();
		$activities = $m->order("id desc")->limit(6)->select();

		$this->assign('tuimessage',$tuimessage);
		$this->assign('latestnews',$latestnews);
		$this->assign('activities',$activities);

		$this->assign('hd',$hd);

		$this->display(":activityinfo");

	}



	public function info(){

		$m = M("message");

		$mls = $m -> order("id desc") -> select();

		$tuimsg = $m -> where("status=1") ->limit(6) -> select();

		$tuimember = M("Approve") -> where("tuij=1") -> select();

		$tuiprod = M("produce") -> where("status=1") -> select();



		$this->assign('mls',$mls);

		$this->assign("tuimessage",$tuimsg);

		$this->assign("tuimember",$tuimember);

		$this->assign("tuiprod",$tuiprod);

		$this->display(":info");		

	}



	public function infoinfo(){

		$id = $_GET['id'];

		$m = M("message");

		$sm = $m -> where("id=$id") -> find();

		$tuimessage = $m->where("status=1")->select();
		$latestnews = $m->order("id desc")->limit(6)->select();
		$activities = M("mbersimg")->order("id desc")->limit(6)->select();


		$this->assign('tuimessage',$tuimessage);
		$this->assign('latestnews',$latestnews);
		$this->assign('activities',$activities);

		$this->assign('sm',$sm);

		$this->display(":infoinfo");

	}



	public function search(){

		$typ = $_POST['type'];

		if($typ==0){

			$pname = $_POST['sear'];

			$m = M("produce");

			$where['pname'] = array('like','%'.$pname.'%');

			$search = $m -> where($where) -> select();
			
			//$search['stype'] = "productinfo";
			$arr = array();
			$arr['types'] = 'productinfo';
			if(empty($search)){

				$arr['name']="没有搜索到符合条件的结果!";

			}
			$this->assign('arr',$arr);

		}else{

			$mname = $_POST['sear'];

			$m = M("Approve");

			$where['mname'] = array('like','%' .$mname. '%');

			$search = $m -> where($where) -> select();

			//$search['stype'] = "memberinfo";
			
			$tuimember = $m -> where("tuij=1")->select();

			$this->assign("tuimsg",$tuimember);

			$arr = array();
			$arr['types'] = 'memberinfo';
			if(empty($search)){

				$arr['name']='没有搜索到符合条件的结果!';

			}
			$this->assign('arr',$arr);

		}

		$n = M("message");

		$tuimg = $n -> where("status=1")->select();

		$this->assign('tuimessage',$tuimg);

		$this->assign('tuimsg',$tuimember);

		$this->assign("search",$search);

		$this->display(":search");

	}



	public function nlmy(){



		$list = M("Approve")->where("htypeid=1")->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function ckzz(){



		$list = M('Approve')->where('htypeid=2')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function drrq(){

		$list = M('Approve')->where('htypeid=3')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function jzfc(){

		$list = M('Approve')->where('htypeid=4')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function pfls(){

		$list = M('Approve')->where('htypeid=5')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function rjxx(){

		$list = M('Approve')->where('htypeid=6')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function wtyl(){

		$list = M('Approve')->where('htypeid=7')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}



	public function gjzz(){

		$list = M('Approve')->where('htypeid=8')->order("id desc")->select();

		if($list){

			echo json_encode($list);

		}else{

			echo '{"info":"此行业暂无会员!"}';

		}

	}

}
