using System;

namespace sorubes
{
    class Program
    {
        static void Main(string[] args)
        {
            //B(2) Grubu 5.Soru
            int kucuk;
            int buyuk;
            Console.WriteLine("Dizi Uzunluğu: ");
            int uzunluk = Convert.ToInt32(Console.ReadLine());
            int[] sayi = new int[uzunluk];
            Random rnd = new Random();
            

            for (int i = 0; i < uzunluk; i++)
            {
                sayi[i] = rnd.Next(1, 100);
                Console.WriteLine("Element: {0}", sayi[i]);
            }
            kucuk = sayi[0];
            buyuk = sayi[0];

            for (int i = 1; i < uzunluk; i++)
            {
                if (kucuk > sayi[i])
                {
                    kucuk = sayi[i];
                }

                if (buyuk < sayi[i])
                {
                    buyuk = sayi[i];
                }

            }
 
            Console.WriteLine("En büyük sayı: " + buyuk);
            Console.WriteLine("En küçük sayı: " + kucuk);
            Console.ReadKey();
        }
    }
}
