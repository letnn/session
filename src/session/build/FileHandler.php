<?php
namespace letnn\session\build;

class FileHandler implements InterfaceSession
{

	use Base;

	protected $dir;
    
	protected $file;

	protected $strstr = "<php exit();?>";

	public function connect() {
		$dir = $this->config["file"]["path"];
		if (!is_dir($dir)) {
			mkdir($dir, 0755, true);
		}
		$this->dir = realpath($dir);
		$this->file = $this->dir . "/" . $this->session_id . ".php";	
	}

	public function read() {
		if (!is_file($this->file)) {
			return [];
		}		
		return unserialize(@file_get_contents($this->file));
	}

	//保存数据
	public function write()	{
		$data = serialize($this->items);	
		return @file_put_contents($this->file, $data, LOCK_EX);
	}

	public function gc() {
		foreach (glob($this->dir . "/*.php") as $f) {
			if (basename($f) != basename($this->file) && (filemtime($f) + $this->expire + 3600) < time()) {
				unlink($f);
			}
		}
	}

}

?>
