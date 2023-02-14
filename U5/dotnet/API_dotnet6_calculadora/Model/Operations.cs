namespace Model
{
    public class Operations
    {
        public static int CalcularAreaTriangulo(int base_triangulo, int altura)
        {
            return (base_triangulo * altura) / 2;
        }
        
        public static int CalcularFactorial(int numero){
            if(numero==0){
                return 1;
            }else if(numero>0){
                int result=1;
                for (int i = 2; i <= numero; i++)
                {
                    result=result*i;
                }
                return result;
            }else{
                return -1;
            }
        }
    }
}