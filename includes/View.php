<?php 

namespace Wuffi;

class View {

	private $props;
	private $scope;

	public function __get(string $key) {
		return $this->scope[$key] ?? null;
	}

	public function __isset(string $key): bool {
		return isset($this->scope[$key]);
	}

	private function setProps(array $data): void {

		foreach ($data as $key => $value) {
			$this->props[$key] = $value;
		}

	}

	public function component(string $path, array $data = []): void {
		(new self())->render('components.'.$path, $data);
	}

	public function include(string $path): void {
		$this->render($path);
	}

	public function render(string $path, array $data = []): void {

		$this->setProps($data);

		$path = str_replace('.', '/', $path);
		$file = THEME_PATH.'/'.$path.'.php';

		if (is_file($file)) {
			include($file);
		}
		
	}

	public function props(array $props = []): void {

		foreach ($props as $key => $data):

			// Local prop
			if (isset($data['value'])) {
				$this->scope[$key] = $data['value'];
				continue;
			}

			// Apply default
			if (isset($data['default']) && !isset($this->props[$key])) {
				$this->scope[$key] = $data['default'];
				continue;
			}

			// Required
			if (isset($data['required']) && $data['required'] === true && !isset($this->props[$key])) {
				throw new \Exception('Property "'.$key.'" is required');
			}

			// Allowed values
			if (isset($data['allowed'], $this->props[$key]) && is_array($data['allowed']) && !in_array($this->props[$key], $data['allowed'])) {
				throw new \Exception('Property value for "'.$key.'" did not pass validation');
			}

			// Validate type
			if (isset($data['type'], $this->props[$key])) {

				$type = strtolower(gettype($this->props[$key]));
				$allowed = array_map('strtolower', explode('|', $data['type']));

				if (!in_array($type, $allowed)) {
					throw new \Exception('Property "'.$key.'" expected type '.ucfirst($data['type']).', encountered '.ucfirst($type));
				}

			}

			// Save to scope
			$this->scope[$key] = $this->props[$key] ?? null;

		endforeach;

	}
	
}