<?php

/**
 * Laravel library to create a systempay transaction
 *
 * @author restoore <https://github.com/restoore>
 * @version 1.0
 */

namespace Restoore\Systempay;

use Illuminate\Support\Facades\Config;

class Systempay
{

	protected $siteId;
	protected $key;
	protected $url;
	protected $params;

	/**
	 * Systempay constructor
	 * 
	 * @param string $config Config name
	 */
	public function __construct(string $config = 'systempay')
	{
		$config = Config::get($config);
		$this->siteId  = $config['id'];
		$this->key     = $config['key'];
		$this->url     = $config['url'];
		$this->params  = $config['params'] ?: [];

		// Set mode
		$this->set('ctx_mode', $config['mode'])->set('site_id', $this->siteId);
	}


	/**
	 * Set a form param
	 * @param string $param  Param without "vads_"
	 * @param string $value
	 */
	public function set(string $param, string $value): self
	{
		$this->params["vads_{$param}"] = $value;

		return $this;
	}

	/**
	 * Get param value
	 * @param  string $param
	 * @return string|null
	 */
	public function get(string $param)
	{
		return $this->params[$param] ?? null;
	}


	/**
	 * Check is param exists
	 * @param  string  $param
	 * @return boolean
	 */
	public function has(string $param): bool
	{
		return isset($this->params["vads_{$param}"]);
	}

	/**
	 * Remove a param
	 * @param  string $param
	 * @return self
	 */
	public function remove(string $param): self
	{
		if ($this->has($param)) {

			unset($this->params[$param]);
		}
	}

	/**
	 * Enabling/disabling 3D Secure
	 * @param  bool $enable
	 * @return self
	 */
	public function set3ds(bool $enable = true): self
	{
		return $this->set('threeds_mpi', ($enable ? 0 : 2));
	}

	/**  
	 * Get all params
	 * @return array
	 */
	public function getParams(): array
	{
		return $this->params;
	}


	/**
	 * Return systempay signature
	 * @return      String systempay signature
	 */
	public function getSignature()
	{
		$data = '';
		ksort($this->params);

		foreach ($this->params as $v)
		{
			$data .= "{$v}+";
		}

		return sha1($data . $this->key);
	}

	/**
	 * Get the form
	 * @param  string $btn Costum html button
	 * @return string
	 */
	public function getForm(string $btn): string
	{
		$this->set('trans_date', gmdate('YmdHis'));

		$form = '<form method="POST" action="'. $this->url .'" accept-charset="UTF-8">';

		foreach ($this->params as $k => $v)
		{
			$form .= '<input type="hidden" name="'. $k .'" value="'. $v .'">';
		}

		return $form . '<input type="hidden" name="signature" value="'. $this->getSignature() .'" >' . $btn . '</form>';
	}
}
