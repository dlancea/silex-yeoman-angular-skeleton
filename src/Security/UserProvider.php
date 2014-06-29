<?php
namespace AppName\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

use AppName\Model\User as UserModel;

class UserProvider implements UserProviderInterface {
	public function loadUserByUsername($username){
		$user = UserModel::find_by_username(strtolower($username));

		if (!$user) {
			throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
		}

		return new User($user->username, $user->password, array('ROLE_USER'), true, true, true, true);
	}

	public function refreshUser(UserInterface $user){
		if (!$user instanceof User) {
			throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
		}

		return $this->loadUserByUsername($user->getUsername());
	}

	public function supportsClass($class){
		return $class === 'Symfony\Component\Security\Core\User\User';
	}
}
