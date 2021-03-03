using System;

namespace sarudort
{
    class Program
    {
        static void Main(string[] args)
        {
            //B(2) Grubu 4.Soru
            char harf = 'A';
          
            Console.WriteLine("Satır girin: ");
            int satir = Convert.ToInt32(Console.ReadLine());

            int i;
            for (i = 1; i <= satir; i++)
            {
                for (int j = 5; j >= i; j--)
                {
                    Console.Write(" ");
                }
                    
                for (int k = 1; k <= i; k++)
                {
                    Console.Write(harf++);
                }
                
                harf--;
                for (int m = 1; m < i; m++)
                {
                    Console.Write(--harf);
                }
                    
                Console.Write("\n");
            }

            Console.ReadKey();
        }
    }
}
