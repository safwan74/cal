<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CalculateType;

class SimpleCalculatorController extends Controller
{
    /**
     * @Route("/calculate")
     */
    public function calculateAction(Request $request)
    {
        $result = "";
        
        $form = $this->createForm(CalculateType::class);
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) 
            {
               $num1 = $form->get('num1')->getData();
               $num2 = $form->get('num2')->getData();
               $op = $form->get('op')->getData();
               $result = $this->calculate($num1, $num2, $op);
            
            }
            
        return $this->render('@App/SimpleCalculator/calculate.html.twig', 
            array(
                'form'=>$form->createView(),
                'result' => $result,
                
            
        ));
    }
    
    function calculate(int $num1, int $num2, $op)
    {
        switch($op)
        {
            case '+':
            return $num1 + $num2;
            break;

            case '-':
            return $num1 - $num2;
            break;

            case '*':
            return $num1* $num2;
            break;

            case '/':
            return $num1 / $num2;
            break;

            default:
            return "No calculation is performed yet";
        }   
    }
    


}
