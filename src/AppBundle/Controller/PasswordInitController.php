<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class PasswordInitController extends BaseController
{
    public function initPasswordAction(Request $request)
    {
        $user = $this->getCurrentUser();

        if ($user['passwordInit']) {
            return $this->redirect($this->generateUrl('homepage'));
        }

        if ('POST' == $request->getMethod()) {
            $formData = $request->request->all();
            $this->getUserService()->initPassword($user['id'], $formData['newPassword']);

            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('init-password/init-password.html.twig');
    }
}
