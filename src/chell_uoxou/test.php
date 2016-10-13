<?php

namespace TestPlugin;#plugin main class name (ex: ->plugin name )...

use phppo\system\systemProcessing;
use phppo\command\plugincommand\addcommand;

$pluginAddCommand = new addcommand;

$pluginAddCommand -> addcommand("TestPlugin","#base_command","plugin","#command description.");
// $pluginAddCommand -> addcommand("TestPlugin","add_more","plugin","add more commands...");

class main/*main class name (ex:"main") */ extends systemProcessing{

	function __construct(){
		# code...
	}

	function onLoad(){ //Method runs when this plugin is loaded.
		$this->sendMessage("テストのプラグインが読み込まれたよ！？\n[onLoad]っていうイベントの取得だよ！？");
	}

	function onCommand(){ //Method runs when runned the commands of this plugin.

		global $aryTipeTxt;// $aryTipeTxt : Array after processing of the input character string.
		global $raw_input;// $raw_input : Input strings.
		global $currentdirectory;// $currentdirectory : current directory (full path)
		global $poPath;// $poPath : Entire directory. (ex: $poPath . "/root/bin/user.json")

		$this->addlog("コマンドが実行されたよ！");//[PHPPO/INFO][TestPlugin]コマンドが実行されたよ！
		$this->info("[TestPlugin]コマンドが実行されたよ！");// as $this->addlog("コマンドが実行されたよ！");
		$this->throwError("エラーなんか起きてないよ(>_<)");//[PHPPO/ERROR]エラーなんか起きてないよ(/ω＼)

		$baseCommand = $aryTipeTxt[0]; // to get base command.
		switch ($baseCommand) {
			case 'test': // on "test" command
				# code...
				break;

			case 'add_more':// on "add_more" command
				# code...
				break;

			default: // it won't run... believe in you...
				# code...
				break;
		}

		$this->info("=============variables=============");
		$this->vardump("aryTipeTxt"); // call to a function in this class.
		$this->vardump("raw_input");
		$this->vardump("currentdirectory");
		$this->vardump("poPath");

		if (count($aryTipeTxt) > 1) { // there are args.
			$this->addlog("引数があるみたいだよ！");
			$this->info(var_export($aryTipeTxt));
		}
	}

	private function vardump($var_name = NULL){ // declare a private method
		if (isset($var_name)) {
			$scope = $GLOBALS[$var_name];

			$this->info($var_name . ' : ' . trim(var_export($scope,true)) . PHP_EOL
			$this->info("-----------------------------------");
		}
	}
}
