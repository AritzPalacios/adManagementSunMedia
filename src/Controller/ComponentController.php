<?php
/**
 * Description of ComponentController
 *
 * @author aritz
 */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Form\ComponentType;


class ComponentController extends AbstractController {
    
    public function CreateAction(Request $request) {
         $form = $this->createForm(ComponentType::class);
         
         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $format = $this->checkFormat($data);
            if (!$format){
                return $this->render('Component/index.html.twig', ['actionResult' => 'Error: Format of component is not valid']);
            }
            $componentService = $this->get('Component');
            $componentService->create($data);
            

            return $this->render('Component/index.html.twig', ['actionResult' => 'success']);
        }
        
        return $this->render('Component/index.html.twig', ['form' => $form->createView()]);
    }
    
    private function checkFormat($data) {
        try{
            $fileInfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fileInfo->buffer(file_get_contents($data['link']));
            if($data['type'] == 'image' && ($mimeType =='image/jpg' || $mimeType =='image/png')){
                return true;
            }

            if($data['type'] == 'video' && ($mimeType =='video/mp4' || $mimeType =='video/webm')){
                return true;
            }
        } catch (Exception $ex) {
            return false;
        }
        
        return false;
    }
}
