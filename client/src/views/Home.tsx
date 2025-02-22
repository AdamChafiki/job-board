import { Box, Button, Image, Text, HStack, VStack } from "@chakra-ui/react";
import search from "@/assets/search.svg";

function Home() {
  return (
    <Box px={6} py={10} maxW="1000px" mx="auto">
      <HStack spacing={10} align="center" justify="space-between">
        <VStack align="start" spacing={4} maxW="500px">
          <Text fontSize="3xl" fontWeight="bold" color="gray.800">
            Find Your Dream Job Today!
          </Text>
          <Text fontSize="md" color="gray.500">
            Thousands of jobs from top companies. Apply now and take the next
            step in your career!
          </Text>
          <Button colorPalette={"blue"} size="lg">
            Browse Jobs
          </Button>
        </VStack>
        <Image src={search} alt="Job Search" boxSize="350px" />
      </HStack>
    </Box>
  );
}

export default Home;
