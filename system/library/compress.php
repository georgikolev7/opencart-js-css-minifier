<?php

require_once DIR_SYSTEM . 'library/minify/minify/src/Minify.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/CSS.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/JS.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/Exception.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/Exceptions/BasicException.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/Exceptions/FileImportException.php';
require_once DIR_SYSTEM . 'library/minify/minify/src/Exceptions/IOException.php';
require_once DIR_SYSTEM . 'library/minify/path-converter/src/ConverterInterface.php';
require_once DIR_SYSTEM . 'library/minify/path-converter/src/Converter.php';

use MatthiasMullie\Minify;

class Compress {
	
	public function merge_css($files)
	{
		$compressed_file = md5(serialize($files)) . '.css';
		$compressed_path = DIR_CACHE . $compressed_file;
		
		if (!file_exists($compressed_path)) { file_put_contents($compressed_path, ' '); } // Ако файла не съществува още
		
		if (empty($files)) { return $compressed_file; } // Ако няма файлове
		
		$i = 0;
		foreach ($files as $key => $file)
		{
			$file = DIR_HOME . $file['href'];
			
			if ($i == 0)
			{
				$minifier = new Minify\CSS($file);
			} 
			else
			{
				$minifier->add($file);
			}
			$i++;
		}
		
		$minifier->minify($compressed_path);
		
		return $compressed_file;
	}
	
	public function merge_js($files)
	{
		$compressed_file = md5(serialize($files)) . '.js';
		$compressed_path = DIR_CACHE . $compressed_file;
		
		if (!file_exists($compressed_path)) { file_put_contents($compressed_path, ' '); } // Ако файла не съществува още
		
		if (empty($files)) { return $compressed_file; } // Ако няма файлове
		
		$i = 0;
		foreach ($files as $key => $file)
		{
			$file = DIR_HOME . $file;
			
			if ($i == 0)
			{
				$minifier = new Minify\JS($file);
			} 
			else
			{
				$minifier->add($file);
			}
			$i++;
		}
		
		$minifier->minify($compressed_path);
		
		return $compressed_file;
	}
}
