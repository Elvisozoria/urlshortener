<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['original_url', 'short_url', 'title', 'hits', 'user_id'];

    public function generateShortUrl(){
        $long_url = $this -> original_url;
        $this->short_url = $this->encode($this->id);
        $this->save();
    }

    

    const ALPHABET = '23456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ-_';
	const BASE = 51; // strlen(self::ALPHABET)

	public static function encode($num) {
		$str = '';

		while ($num > 0) {
			$str = self::ALPHABET[($num % self::BASE)] . $str;
			$num = (int) ($num / self::BASE);
		}

		return $str;
	}

	//we won't use this for now
	public static function decode($str) {
		$num = 0;
		$len = strlen($str);

		for ($i = 0; $i < $len; $i++) {
			$num = $num * self::BASE + strpos(self::ALPHABET, $str[$i]);
		}

		return $num;
	}
	
    public function visit()
    {
        $this -> hits += 1;
        $this -> save();
        return $this -> original_url;

    }
}
   

