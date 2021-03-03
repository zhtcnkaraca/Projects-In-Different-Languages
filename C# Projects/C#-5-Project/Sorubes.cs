using System;

namespace bes
{
    class Program
    {
        static void Main(string[] args)
        {
            //A Grubu Soru 5
            Console.Write("Satır Sayısı Giriniz: \n");
            int satir = int.Parse(Console.ReadLine());
            int i;
            for (i = 1; i <= satir; i++)
            {
                for (int j = 1; j <= satir - i; j++)
                {
                    Console.Write(" ");
                }
                for (int a = 1; a <= i; a++)
                {
                    Console.Write(a);
                }
                for (int b = i - 1; b >= 1; b--)
                {
                    Console.Write(b);
                }
                Console.Write("\n");
            }

            Console.ReadKey();

        }
    }
}
