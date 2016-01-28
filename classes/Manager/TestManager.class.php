<?php

namespace Manager;
use Ve\InvalidSpeedException;

class TestManager {

	public static function checkProperties($class, $array_check) {
		$reflect = new \ReflectionClass($class);
		$props_bdd = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
		$problem = false;

		foreach ($props_bdd as $prop) {
			if(!in_array($prop->name, $array_check)) $problem = true;
		}

		if($problem) {

			try {
				throw new InvalidSpeedException("Your property number for class ".get_class($class)." doesn't match your test", 1);
			} catch (InvalidSpeedException $e) {}
		}
	}
}
