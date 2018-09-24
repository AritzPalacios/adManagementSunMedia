<?php
/**
 * Description of AdController
 *
 * @author aritz
 */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
 
use Form\AdType;


class AdController extends AbstractController {
    
  
    public function ListAction() {
         $adService = $this->get('Ad');
         $ads = $adService->listAd();
        
        return $this->render('Ad/index.html.twig', ['data'=> $ads]);
    }
    
    public function CreateAction() {
         $adService = $this->get('Ad');
         $adService->create();
        
        return $this->render('Ad/index.html.twig', []);
    }
    
    /**
     * @Route("/adEdit/{ad_id}")
     * @ParamConverter("ad", class="Ad" options={"id" = "ad_id"})
     */
    public function EditAction(Ad $ad) {
        
        if ($ad->getStatus() == 'publishing'){
            return $this->render('Ad/edit.html.twig', ['actionResult' => 'You can not edit this ad']);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(AdType::class, null, ['entity_manager' => $entityManager]);
         
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
     
            $adService = $this->get('Ad');
            $adService->addComponent($ad, $data['component']);
            

            return $this->render('Ad/index.html.twig', ['actionResult' => 'success']);
        }

        return $this->render('Ad/index.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * 
     * @ParamConverter("ad", options={"id" = "ad_id"})
     */
    public function publishAction(Ad $ad) {
        
        $adService = $this->get('Ad');
        $adService->publish();
        
        return $this->render('Ad/index.html.twig', []);
    }
}
