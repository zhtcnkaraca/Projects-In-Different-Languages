using System;

namespace soruuc
{
    class Program
    {
        static void Main(string[] args)
        {
            //B(2) Grubu 3.Soru
            int ekok = 1;
            int sayac;
            int ebob = 1;
            Console.WriteLine("1. Sayıyı giriniz: ");
            int sayi1 = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("2. Sayıyı giriniz: ");
            int sayi2 = Convert.ToInt32(Console.ReadLine());
            
            if (sayi1 > sayi2)
                sayac = sayi1;
            else
                sayac = sayi2;
            for (int i = 1; i <= sayac; i++)
            {
                if ((sayi1 % i == 0) && (sayi2 % i == 0))
                {
                    ebob = i;
                }
                ekok = (sayi1 * sayi2) / ebob;

            }
            Console.WriteLine("Sonuc Ekok:{0}", ekok );
            Console.ReadKey();

        }

    }
}
