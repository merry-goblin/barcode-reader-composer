<?php

/**
 * @link https://github.com/merry-goblin/barcode-reader-composer
 */

namespace MerryGoblin\BarcodeReader\Services\Barcode;

use Symfony\Component\Process\Process;

use Symfony\Component\Process\Exception\ProcessFailedException;

class BarcodeReader
{
	public function __construct()
	{

	}

	/**
	 * @param string $fullFilePath
	 * @return string
	 * @throws ProcessFailedException
	 */
	public function parse($fullFilePath)
	{
		$process = new Process(['zbarimg', $fullFilePath]);
		$process->run();

		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

		return $process->getOutput();
	}
}