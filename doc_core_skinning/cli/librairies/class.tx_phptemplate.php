<?php
//Source : http://www.massassi.com/php/articles/template_engines/
//possible improvement with SMARTY integration : http://www.kirkbrown.com/tutorials/php-template-system/

class tx_phptemplate {
	private $vars = array(); /// Holds all the template variables

	/**
	 * Constructor
	 *
	 * @param $file string the file name you want to load
	 */
	function __construct($file = null){
		$this->file = $file;
	}

	/**
	 * Set a template variable.
	 */
	function set($name, $value){
		$this->vars[$name] = is_object($value) ? $value->fetch() : $value;
	}

	/**
	 * Open, parse, and return the template file.
	 *
	 * @param $file string the template file name
	 */
	function fetch($file = null){
		if(! $file) {
			$file = $this->file;
		}
		
		extract($this->vars); // Extract the vars to local namespace
		ob_start(); // Start output buffering
		include ($file); // Include the file
		$contents = ob_get_contents(); // Get the contents of the buffer
		ob_end_clean(); // End buffering and discard
		return $contents; // Return the contents
	}
}

/**
 * An extension to Template that provides automatic caching of
 * template contents.
 */
class tx_phpcachedtemplate extends tx_phptemplate{
	public $cache_id;
	public $expire;
	public $cached;

	/**
	 * Constructor.
	 *
	 * @param $cache_id string unique cache identifier
	 * @param $expire int number of seconds the cache will live
	 */
	function __construct($cache_id = null, $expire = 900){
		$this->Template();
		$this->cache_id = $cache_id ? 'cache/' . md5($cache_id) : $cache_id;
		$this->expire = $expire;
	}

	/**
	 * Test to see whether the currently loaded cache_id has a valid
	 * corrosponding cache file.
	 */
	function is_cached(){
		if($this->cached)
			return true;

		// Passed a cache_id?
		if(! $this->cache_id)
			return false;

		// Cache file exists?
		if(! file_exists($this->cache_id))
			return false;

		// Can get the time of the file?
		if(! ($mtime = filemtime($this->cache_id)))
			return false;

		// Cache expired?
		if(($mtime + $this->expire) < time()){
			@unlink($this->cache_id);
			return false;
		} else{
			/**
			 * Cache the results of this is_cached() call.  Why?  So
			 * we don't have to double the overhead for each template.
			 * If we didn't cache, it would be hitting the file system
			 * twice as much (file_exists() & filemtime() [twice each]).
			 */
			$this->cached = true;
			return true;
		}
	}

	/**
	 * This function returns a cached copy of a template (if it exists),
	 * otherwise, it parses it as normal and caches the content.
	 *
	 * @param $file string the template file
	 */
	function fetch_cache($file){
		if($this->is_cached()){
			$fp = @fopen($this->cache_id, 'r');
			$contents = fread($fp, filesize($this->cache_id));
			fclose($fp);
			return $contents;
		} else{
			$contents = $this->fetch($file);

			// Write the cache
			if($fp = @fopen($this->cache_id, 'w')){
				fwrite($fp, $contents);
				fclose($fp);
			} else{
				die('Unable to write cache.');
			}

			return $contents;
		}
	}
}
?>