<html><body><?php
echo "20180829(水)-20200429(水)_Shuffle-PlayingCard.php<br>";

// SUIT of CARD
class Suit extends SplEnum {
	const Baba = 0;
	const Clover = 1;
	const Diamond = 2;
	const Heart = 3;
	const Spade = 4;
	const Joker = 10;
}

// NUNBER of CARD
class CardNumber extends SplEnum {
	const '1' = 1;
	const '2' = 2;
	const '3' = 3;
	const '4' = 4;
	const '5' = 5;
	const '6' = 6;
	const '7' = 7;
	const '8' = 8;
	const '9' = 9;
	const 'Ten' = 10;
	const 'Jack' = 11;
	const 'Queen' = 12;
	const 'King' = 13;
	const 'Ace' = 14;
	const 'Joker' = 15;
}

class PlayingCard {
	private Suit $suit;
	private CardNumber $cardNumber;
	private String $cardName;

	// コンストラクタ
	public constract($suit, $number){
		$this->CardName = "";
		$this->suit = (Suit)$suit;
		$this->CardName += NamingSuit($suit);
		$this->cardNumber = (CardNumber)$number;
		$this->CardName += NamingNumber($number);
	}

	// メソッド
	// suit の naming
	static function NamingSuit($suit) {
		switch ($suit) {
			case 0 : return "";
			case 1 : return "C";
			case 2 : return "D";
			case 3 : return "H";
			case 4 : return "S";
			case 5 : return "";
			default : return "";
		}
	}
	// number の naming
	static function NamingNumber($number) {
		switch ($number) {
			case 0 : return "";
			case 1 : return "A";
			case 2 : return "2";
			case 3 : return "3";
			case 4 : return "4";
			case 5 : return "5";
			case 6 : return "6";
			case 7 : return "7";
			case 8 : return "8";
			case 9 : return "9";
			case 10 : return "10";
			case 11 : return "J";
			case 12 : return "Q";
			case 13 : return "K";
			case 14 : return "A";
			case 15 : return "Joker";
			default : return "";
		}
	}
	
	// カードの名前を設定
	static function CardNaming() {
		$cardName = NamingSuit($suit) + NamingNumber($number);
		return $cardName == "" ? "Joker" : $cardName;
	}

	// randomNumberの決定を簡単に
	static function NumberDecideElementary() {
		return rand() % 0x70000000;
	}
	// randomNumberの決定
	static function NumberDecide() {
		return mt_rand() % 0x70000000;
	}
	// randomNumberの再決定 定数分をずらす
	static function NumberReDecide(&$baseValue, $addValue) {
		$baseValue = ($baseValue += $addValue) %= 0x70000000 
		return $baseValue;
	}
	// randomNumberの再決定overload ランダム決定
	static function NumberReDecide(&$baseValue) {
		return NumberReDecide($baseValue, NumberDecideElementary());
	}
	// ランダム札種選択1回分(Joker弱い)
	static function SuitSelectJWeak($randomNumber) {
		return $randomNumber % 5;
	}
	// ランダム札種選択1回分(Joker強い)
	static function SuitSelectJStrong($randomNumber) {
		$suitValue = $randomNumber % 5;
		return $suitValue == 0 ? 5 : $suitValue;
	}
	// ランダム数位選択1回分(A~K, Joker弱い)
	static function NumSelAceLesserJWeak($randomNumber) {
		return = $randomNumber % 14;
	}
	// ランダム数位選択1回分(A~K, Joker強い)
	static function NumSelAceLesserJStrong($randomNumber) {
		$numberValue = $randomNumber % 14;
		return $numberValue == 0 ? 15 : $numberValue;
	}
	// ランダム数位選択1回分(2~A, Joker弱い)
	static function NumSelAceGreaterJWeak($randomNumber) {
		$numberValue = $randomNumber % 15;
		return $numberValue == 1 ? NumSelAceGreaterJWeak(NumberReDecide($randomNumber)) : $numberValue; // 1を返したらやり直す
	}
	// ランダム数位選択1回分(2~A, Joker強い)
	static function NumSelAceGreaterJStrong($randomNumber) {
		$numberValue = $randomNumber % 15;
		return $numberValue == 1 ? NumberReDecide($randomNumber) : ($numberValue == 0 ? 15 : $numberValue); // 1を返したらやり直す
	}

	// カード1枚選択(A~K,Jokerなし)
	// カード1枚選択(2~A,Jokerなし)
	// カード1枚選択(A~K,Joker弱い)
	// カード1枚選択(2~A,Joker弱い)
	// カード1枚選択(A~K,Joker強い)
	// カード1枚選択(2~A,Joker強い)
	
}



session_start();

$turn = empty($_GET["turn"]) ? 0 : intval($_GET["turn"]);







?></body></html>
